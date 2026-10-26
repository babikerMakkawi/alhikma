<?php

namespace App\Http\Controllers;

use App\Http\Requests\Researches\ImportResearchIndexRequest;
use App\Http\Requests\Researches\StoreResearchIndexRequest;
use App\Http\Requests\Researches\UpdateResearchIndexRequest;
use App\Models\Researches\ResearchIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ResearchIndexController extends Controller
{
    public function index(Request $request)
    {
        $query = ResearchIndex::query();

        // Only these columns may be searched or sorted (prevents invalid/unsafe column names)
        $allowedSortFields = ['id', 'subject', 'title', 'researcher', 'number', 'created_at'];

        // Handle search
        if ($request->filled('search') && in_array($request->sort_by, $allowedSortFields)) {
            $query = $query->where($request->sort_by, 'like', '%' . $request->search . '%');
        } elseif ($request->filled('search')) {
            // If search exists but no sort_by, search in all relevant fields
            $query = $query->where(function ($q) use ($request) {
                $q->where('subject', 'like', '%' . $request->search . '%')
                    ->orWhere('title', 'like', '%' . $request->search . '%')
                    ->orWhere('researcher', 'like', '%' . $request->search . '%')
                    ->orWhere('number', 'like', '%' . $request->search . '%');
            });
        }

        // Handle sorting
        $sortBy = $request->input('sort_by', 'id'); // Default sort by id
        $sortOrder = $request->input('sort_order', 'desc'); // Default descending

        if (!in_array($sortBy, $allowedSortFields)) {
            $sortBy = 'id';
        }

        // Validate sort_order
        $sortOrder = strtolower($sortOrder) === 'asc' ? 'asc' : 'desc';

        // Special handling for number field (stored as string, needs numeric sorting)
        if ($sortBy === 'number') {
            $query = $query->orderByRaw('CAST(number AS UNSIGNED) ' . strtoupper($sortOrder));
        } else {
            $query = $query->orderBy($sortBy, $sortOrder);
        }

        $research_index = $query->paginate(10)->appends($request->query());

        return view('dashboard.researchIndex.index', compact('research_index'));
    }

    public function store(StoreResearchIndexRequest $request)
    {
        ResearchIndex::create([
            "subject" => $request->subject,
            "title" => $request->title,
            "researcher" => $request->researcher,
            "number" => $request->number,
        ]);

        return redirect()->route('researchesIndex.index')->with('success', 'تم إنشاء فهرس البحث بنجاح');
    }

    public function edit(ResearchIndex $researchesIndex)
    {
        // Edit functionality is handled via modal on index page
        return redirect()->route('researchesIndex.index');
    }

    public function update(UpdateResearchIndexRequest $request, ResearchIndex $researchesIndex)
    {
        $researchesIndex->update([
            "subject" => $request->subject,
            "title" => $request->title,
            "researcher" => $request->researcher,
            "number" => $request->number,
        ]);

        return redirect()->route('researchesIndex.index')->with('success', 'تم تحديث فهرس البحث بنجاح');
    }

    public function destroy(ResearchIndex $researchesIndex)
    {
        $researchesIndex->delete();
        return redirect()->route('researchesIndex.index')->with('success', 'تم مسح فهرس البحث بنجاح.');
    }

    public function deleteAll()
    {
        $count = ResearchIndex::count();
        ResearchIndex::truncate();
        Log::warning('All research index entries deleted', ['user_id' => optional(auth()->user())->id, 'deleted_count' => $count]);
        return redirect()->route('researchesIndex.index')->with('success', 'تم مسح جميع فهارس البحوث بنجاح.');
    }

    public function importExcel(ImportResearchIndexRequest $request)
    {
        // Check if ZipArchive extension is available
        if (!class_exists('ZipArchive')) {
            Log::error('Research index import failed: PHP zip extension (ZipArchive) is not enabled');
            return redirect()->route('researchesIndex.index')->with('error', 'امتداد ZipArchive غير مفعل في PHP. يرجى تفعيله في ملف php.ini (extension=zip) ثم إعادة تشغيل الخادم.');
        }

        try {
            $file = $request->file('excel_file');

            // Read the Excel file
            $data = Excel::toArray([], $file);

            if (empty($data) || empty($data[0])) {
                return redirect()->route('researchesIndex.index')->with('error', 'الملف فارغ أو غير صحيح.');
            }

            $rows = $data[0];
            $imported = 0;
            $errors = [];

            // Skip header row (first row)
            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];

                // Check if row has data (at least one non-empty cell)
                if (empty(array_filter($row))) {
                    continue; // Skip empty rows
                }

                // Map columns: الموضوع, إسم البحث, إسم الباحث, العدد
                $subject = $row[0] ?? '';
                $title = $row[1] ?? '';
                $researcher = $row[2] ?? '';
                $number = $row[3] ?? '';

                // Replace empty values with "-" so they can be updated later manually
                $subject = trim($subject) !== '' ? trim($subject) : '-';
                $title = trim($title) !== '' ? trim($title) : '-';
                $researcher = trim($researcher) !== '' ? trim($researcher) : '-';
                $number = trim((string)$number) !== '' ? trim((string)$number) : '-';

                // Skip only if all fields are empty
                if ($subject === '-' && $title === '-' && $researcher === '-' && $number === '-') {
                    continue; // Skip completely empty rows
                }

                try {
                    ResearchIndex::create([
                        'subject' => $subject,
                        'title' => $title,
                        'researcher' => $researcher,
                        'number' => $number,
                    ]);
                    $imported++;
                } catch (\Exception $e) {
                    Log::warning('Research index import: row failed', ['row' => $i + 1, 'error' => $e->getMessage()]);
                    $errors[] = "خطأ في الصف " . ($i + 1) . ": " . $e->getMessage();
                }
            }

            Log::info('Research index imported from Excel', [
                'user_id' => optional($request->user())->id,
                'file' => $file->getClientOriginalName(),
                'imported' => $imported,
                'failed_rows' => count($errors),
            ]);

            $message = "تم استيراد {$imported} سجل بنجاح.";
            if (!empty($errors)) {
                $message .= " أخطاء: " . implode(', ', array_slice($errors, 0, 5));
                if (count($errors) > 5) {
                    $message .= " و " . (count($errors) - 5) . " أخطاء أخرى.";
                }
                return redirect()->route('researchesIndex.index')->with('warning', $message);
            }

            return redirect()->route('researchesIndex.index')->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Research index import failed', [
                'user_id' => optional($request->user())->id,
                'error' => $e->getMessage(),
                'exception' => $e,
            ]);

            return redirect()->route('researchesIndex.index')->with('error', 'حدث خطأ أثناء استيراد الملف: ' . $e->getMessage());
        }
    }
}

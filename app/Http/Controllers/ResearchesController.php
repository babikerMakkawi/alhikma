<?php

namespace App\Http\Controllers;

use App\Http\Requests\Researches\StoreResearchRequest;
use App\Models\Researches\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResearchesController extends Controller
{
    public function index(Request $request)
    {
        $query = Research::query();

        // Only these columns may be searched or sorted (prevents invalid/unsafe column names)
        $allowedFields = ['id', 'title', 'researcher', 'number_of_pages', 'date', 'created_at'];

        $sortBy = in_array($request->input('sort_by'), $allowedFields) ? $request->input('sort_by') : 'id';
        $sortOrder = strtolower($request->input('sort_order', 'desc')) === 'asc' ? 'asc' : 'desc';

        if ($request->filled('search')) {
            $query->where($sortBy, 'like', '%' . $request->search . '%');
        }

        $researches = $query->orderBy($sortBy, $sortOrder)->paginate(10)->appends($request->query());

        return view('dashboard.researches.index', compact('researches'));
    }

    public function store(StoreResearchRequest $request)
    {
        $storedFile = null;

        try {
            $research = DB::transaction(function () use ($request, &$storedFile) {
                $research = Research::create([
                    "id" => $request->id,
                    "title" => $request->title,
                    "researcher" => $request->researcher,
                    "number_of_pages" => $request->number_of_pages,
                    "date" => $request->date,
                ]);

                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filename = $research->id . '-' . Str::slug($research->title) . '-' . $request->date . '.' . $file->getClientOriginalExtension();

                    if (!$file->storeAs('uploads', $filename, 'public')) {
                        throw new \RuntimeException("Could not write uploaded file to storage: {$filename}");
                    }

                    $storedFile = 'uploads/' . $filename;
                    $research->file = $filename;
                    $research->save();
                }

                return $research;
            });
        } catch (\Throwable $e) {
            // Roll back the uploaded file too, so a failed save leaves nothing behind
            if ($storedFile) {
                Storage::disk('public')->delete($storedFile);
            }

            Log::error('Research create failed', [
                'user_id' => optional($request->user())->id,
                'title' => $request->title,
                'file' => $request->hasFile('file') ? $request->file('file')->getClientOriginalName() : null,
                'error' => $e->getMessage(),
                'exception' => $e,
            ]);

            return redirect()->route('researches.index')
                ->withInput($request->except('file'))
                ->with('error', 'حدث خطأ أثناء حفظ البحث، لم يتم الحفظ. يرجى المحاولة مرة أخرى. (' . $e->getMessage() . ')');
        }

        Log::info('Research created', [
            'user_id' => optional($request->user())->id,
            'research_id' => $research->id,
            'title' => $research->title,
            'file' => $research->file,
        ]);

        return redirect()->route('researches.index')->with('success', 'تم إنشاء البحث بنجاح: ' . $research->title);
    }

    public function destroy(Research $research)
    {
        try {
            $research->delete();
        } catch (\Throwable $e) {
            Log::error('Research delete failed', [
                'research_id' => $research->id,
                'error' => $e->getMessage(),
                'exception' => $e,
            ]);

            return redirect()->route('researches.index')->with('error', 'حدث خطأ أثناء مسح البحث: ' . $e->getMessage());
        }

        Log::info('Research deleted', ['user_id' => optional(auth()->user())->id, 'research_id' => $research->id, 'title' => $research->title]);

        return redirect()->route('researches.index')->with('success', 'تم مسح البحث بنجاح.');
    }
}

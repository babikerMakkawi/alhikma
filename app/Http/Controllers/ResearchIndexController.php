<?php

namespace App\Http\Controllers;

use App\Models\Researches\ResearchIndex;
use Illuminate\Http\Request;

class ResearchIndexController extends Controller
{
    public function index(Request $request)
    {
        $query = ResearchIndex::query();

        if ($request->search) {
            $query = $query->where($request->sort_by, 'like', '%' . $request->search . '%');
        }

        $research_index = $query->paginate(10);

        return view('dashboard.researchIndex.index', compact('research_index'));
    }

    public function store(Request $request)
    {
        ResearchIndex::create([
            "subject" => $request->subject,
            "title" => $request->title,
            "researcher" => $request->researcher,
            "number" => $request->number,
        ]);

        return redirect()->route('researchesIndex.index')->with('success', 'تم إنشاء فهرس البحث بنجاح');
    }

    public function destroy(ResearchIndex $research_index)
    {
        $research_index->delete();
        return redirect()->route('researchesIndex.index')->with('success', 'تم مسح فهرس البحث بنجاح.');
    }
}

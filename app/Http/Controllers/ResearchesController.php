<?php

namespace App\Http\Controllers;

use App\Http\Requests\Researches\StoreResearchRequest;
use App\Http\Requests\Researches\UpdateResearchRequest;
use App\Models\Researches\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ResearchesController extends Controller
{
    public function index(Request $request)
    {
        $query = Research::query();

        if ($request->search) {
            $query = $query->where($request->sort_by, 'like', '%' . $request->search . '%');
        }

        $researches = $query->paginate(10);

        return view('dashboard.researches.index', compact('researches'));
    }

    public function store(StoreResearchRequest $request)
    {
        $research = Research::create([
            "title" => $request->title,
            "researcher" => $request->researcher,
            "number_of_pages" => $request->number_of_pages,
            "date" => $request->date,
            // "file" => $request->file,
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $research->id . '-' . Str::slug($research->title) . '-' . $request->date . '.' . $file->getClientOriginalExtension();

            $file->storeAs('uploads', $filename, 'public');
            $research->file = $filename;

            $research->save();
        }


        return redirect()->route('researches.index')->with('success', 'تم إنشاء البحث بنجاح');
    }


    // public function update(UpdateResearchRequest $request, Research $research)
    // {
    //     $research->update([
    //         'field' => $request->field,
    //     ]);
    //     return redirect()->route('researches.index')->with('success', 'Research Updated Successfully.');
    // }

    public function destroy(Research $research)
    {
        $research->delete();
        return redirect()->route('researches.index')->with('success', 'تم مسح البحث بنجاح.');
    }
}

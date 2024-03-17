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
    public function index()
    {
        $researches = Research::paginate(10);
        return view('dashboard.researches.index', compact('researches'));
    }

    public function create()
    {
        return view('researches.create');
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

    public function show(Research $research)
    {
        return view('researches.show', compact('Research'));
    }

    public function edit(Research $research)
    {
        return view('researches.edit', compact('Research'));
    }

    public function update(UpdateResearchRequest $request, Research $research)
    {
        $research->update([
            'field' => $request->field,
        ]);
        return redirect()->route('researches.index')->with('success', 'Research Updated Successfully.');
    }

    public function destroy(Research $research)
    {
        $research->delete();
        return redirect()->route('researches.index')->with('success', 'تم مسح البحث بنجاح.');
    }
}

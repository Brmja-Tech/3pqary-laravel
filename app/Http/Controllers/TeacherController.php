<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = teacher::query()->get();
        return view('dashboard.pages.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = teacher::query()->get();
        return view('dashboard.pages.teachers.create', compact('teachers'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|numeric',
            'note1' => 'nullable|string',
            'note2' => 'nullable|string',
            'note3' => 'nullable|string',
            'note4' => 'nullable|string',
            'socialLink1' => 'nullable|string',
            'socialLink2' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only([
            'name',
            'phone',
            'note1',
            'note2',
            'note3',
            'note4',
            'socialLink1',
            'socialLink2',
            'title',
            'content',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teacher', 'public');
        }
        teacher::create($data);
        return redirect()->route('admin.teachers.index')->with('success', 'Data stored successfully');
    }


    /**
     * Display the specified resource.
     */

    public function show(teacher $teacher)
    {
        return view('dashboard.pages.teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = teacher::findOrFail($id);
        $teachers = teacher::all();
        return view('dashboard.pages.teachers.create', compact('teachers', 'teacher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|numeric',
            'note1' => 'nullable|string',
            'note2' => 'nullable|string',
            'note3' => 'nullable|string',
            'note4' => 'nullable|string',
            'socialLink1' => 'nullable|string',
            'socialLink2' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $model = teacher::findOrFail($id);
        $data = $request->only([
            'name',
            'phone',
            'note1',
            'note2',
            'note3',
            'note4',
            'socialLink1',
            'socialLink2'
        ]);

        if ($request->hasFile('image')) {
            if ($model->image) {
                Storage::disk('public')->delete($model->image);
            }
            // Store the new image
            $data['image'] = $request->file('image')->store('teacher', 'public');
        }

        $model->update($data);

        return redirect()->route('admin.teachers.index')->with('success', 'Data updated successfully');
    }

    public function destroy(teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'teacher deleted successfully!');
    }
}

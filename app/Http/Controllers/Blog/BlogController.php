<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\blog\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::query()->get();
        return view('dashboard.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $blog = Blog::query()->get();
        return view('dashboard.pages.blogs.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $model = new Blog();
        $model->title = $request->input('title');
        $model->content = $request->input('content');

        if ($request->hasFile('image')) {
            $model->image = $request->file('image')->store('blogs', 'public');
        }

        $model->save();
        return redirect()->route('admin.blog.index')->with('success', 'Data stored successfully');
    }

    /**
     * Display the specified resource.
     */

    public function show(Blog $Blog)
    {
        return view('dashboard.pages.blogs.show', compact('Blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $blogs = Blog::all();
        return view('dashboard.pages.blogs.create', compact('blog','blogs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $model = Blog::findOrFail($id);
        $model->title = $request->input('title');
        $model->content = $request->input('content');

        if ($request->hasFile('image')) {
            if ($model->image && file_exists(storage_path('app/public/' . $model->image))) {
                unlink(storage_path('app/public/' . $model->image));
            }
            $model->image = $request->file('image')->store('images', 'public');
        }

        $model->save();

        return redirect()->route('admin.blog.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
}

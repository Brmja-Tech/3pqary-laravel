<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Helpers\HandleUpload;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('dashboard.pages.gallary.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.gallary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'video' => 'nullable|file|mimes:mp4,avi,mkv|max:10240',
        ]);

        $filePath = null;
        $videoPath = null;

        try {

            if ($request->hasFile('file')) {
                $filePath = HandleUpload::uploadFile($request->file, 'gallery');
                if (!$filePath) {
                    throw new \Exception('Failed to upload the image.');
                }
            }
            if ($request->hasFile('video')) {
                $videoPath = HandleUpload::uploadFile($request->video, 'gallery/videos');
                if (!$videoPath) {
                    throw new \Exception('Failed to upload the video.');
                }
            }

            Gallery::create([
                'title' => $request->title,
                'file' => $filePath,
                'video' => $videoPath,
            ]);

            return redirect()->route('admin.gallery.index')->with('success', 'Gallery item created successfully!');
        } catch (\Exception $e) {

            \Log::error('Gallery item creation failed: ' . $e->getMessage());

            return redirect()->route('admin.gallery.index')->with('error', 'Failed to upload the gallery item. Please try again.');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $galleries = Gallery::all();
        return view('dashboard.pages.gallary.create', compact('gallery','galleries'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);
        if ($request->hasFile('file')) {
            $filePath  = HandleUpload::uploadFile($request->file, 'gallery');
            $gallery->update([
                'title' => $request->title,
                'file' => $filePath,
            ]);
        } else {
            $gallery->update([
                'title' => $request->title,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item deleted successfully!');
    }
}

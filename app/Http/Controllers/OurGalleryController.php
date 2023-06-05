<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class OurGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $galleriesArray = $galleries->toArray();
        return Inertia::render('SPA/GalleryView', ['gallery' => $galleriesArray]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imagePath = Storage::putFile('galleries', $image);

        $gallery = Gallery::create([
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return response()->json($gallery, 201);
    }

    public function show(Gallery $gallery)
    {
        return response()->json($gallery);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $gallery->description = $request->description;
        $gallery->save();

        return response()->json($gallery, 200);
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->image);
        $gallery->delete();

        return response()->json(null, 204);
    }
}

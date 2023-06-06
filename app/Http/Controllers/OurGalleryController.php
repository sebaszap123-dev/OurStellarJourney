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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/gallery', $imageName);

            // Guardar la ruta de la imagen en la base de datos
            $image_path = 'gallery/' . $imageName;
            Gallery::create([
                'description' => $request->description,
                'image' => $image_path,
            ]);
            return response()->json(['message' => 'Agregado a la galería.'], 200);
        } else {
            return response()->json(['message' => 'No se pudo agregar a la galería. no ingresaste una imagén'], 400);
        }
    }

    public function show(Gallery $gallery)
    {
        return response()->json($gallery);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        if ($gallery->image) {
            Storage::delete($gallery->image);
        }
        // Get image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/gallery', $imageName);

            // Guardar la ruta de la imagen en la base de datos
            $image_path = 'gallery/' . $imageName;
            $gallery->description = $request->description;
            $gallery->image = $image_path;
            $gallery->save();
            return response()->json(['message' => 'La imagen se ha subido correctamente.'], 200);
        }
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->image);
        $gallery->delete();

        return response()->json(null, 204);
    }
}

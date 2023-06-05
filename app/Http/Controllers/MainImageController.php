<?php

namespace App\Http\Controllers;

use App\Models\MainImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainImageController extends Controller
{

    public function changeImage(Request $request)
    {
        $isDeleted = false;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $mainImage = MainImage::first();
        if ($mainImage) {
            // Eliminar la imagen existente del almacenamiento
            Storage::delete('public/images/' . $mainImage->image_path);

            // Eliminar el registro existente
            $mainImage->delete();
            $isDeleted = true;
        }
        if ($isDeleted) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);

                // Guardar la ruta de la imagen en la base de datos
                $mainImage = new MainImage();
                $mainImage->image_path = 'images/' . $imageName;
                $mainImage->save();

                return response()->json(['message' => 'La imagen se ha subido correctamente.'], 200);
            }
            return response()->json(['message' => 'Error al subir la imagen.'], 400);
        }
        return response()->json(['message' => 'Error al eliminar la imagén anterior.'], 404);
    }
}

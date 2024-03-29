<?php

namespace App\Http\Controllers;

use App\Models\MainImage;
// use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        return Inertia::render('SPA/HomeView');
    }
    public function realhome()
    {
        $image = MainImage::all();
        $imagePaths = $image->pluck('image_path')->toArray();
        return Inertia::render('SPA/StarfieldView', ['main_image' => $imagePaths]);
    }
    public function gallery()
    {
        return Inertia::render('SPA/GalleryView');
    }
    public function loveDiary()
    {
        return Inertia::render('SPA/LoveDiaryView');
    }
    // public function slovify()
    // {
    //     return Inertia::render('SPA/SlovifyView');
    // }
    public function calendar()
    {
        return Inertia::render('SPA/CalendarEvents');
    }
}

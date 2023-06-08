<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainImageController;
use App\Http\Controllers\OurCalendarController;
use App\Http\Controllers\OurGalleryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', [HomeController::class, 'home'])->name('home');

// Routes pages
Route::middleware(['auth'])->group(function () {
    Route::get('/gallery', [OurGalleryController::class, 'index'])->name('gallery');
    Route::get('/love-diary', [HomeController::class, 'loveDiary'])->name('love-diary');
    Route::get('/our-calendar', [OurCalendarController::class, 'index'])->name('calendar');
    Route::get('/home', [HomeController::class, 'realhome'])->name('realhome');
    Route::get('/create-calendar', [OurCalendarController::class, 'calendarPost'])->name('calendar.create');
});

// Forms
Route::middleware(['auth'])->group(function () {
    Route::post('/upload-image', [MainImageController::class, 'changeImage'])->name('upload.image');
    Route::post('/store-gallery', [OurGalleryController::class, 'store'])->name('upload.gallery');
});
Route::post('/store-calendar', [OurCalendarController::class, 'store'])->name('upload.calendar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

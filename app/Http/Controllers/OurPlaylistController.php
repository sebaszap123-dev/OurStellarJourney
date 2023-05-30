<?php

namespace App\Http\Controllers;

use App\Models\OurSong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurPlaylistController extends Controller
{
    public function index()
    {
        $songs = OurSong::all();
        return response()->json($songs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'file' => 'required|mimes:mp3|max:2048',
        ]);

        $file = $request->file('file');
        $filePath = Storage::putFile('songs', $file);

        $song = OurSong::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'file_path' => $filePath,
        ]);

        return response()->json($song, 201);
    }

    public function destroy(OurSong $song)
    {
        Storage::delete($song->file_path);
        $song->delete();

        return response()->json(null, 204);
    }
}

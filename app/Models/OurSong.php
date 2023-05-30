<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurSong extends Model
{
    protected $table = 'our_songs';

    protected $fillable = [
        'title', 'artist', 'file_path'
    ];
}

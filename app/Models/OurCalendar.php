<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCalendar extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'color', 'event_date', 'repeat', 'repeat_type'];
}

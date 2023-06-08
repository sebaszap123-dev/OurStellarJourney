<?php

namespace App\Http\Controllers;

use App\Models\OurCalendar;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OurCalendarController extends Controller
{
    public function index()
    {
        $calendarEvents = OurCalendar::all();
        return Inertia::render('SPA/CalendarEvents', ['calendar' => $calendarEvents]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'event_date' => 'required|date',
            'repeat' => 'boolean',
            'repeat_type' => 'nullable|string',
        ]);

        $event = OurCalendar::create([
            'description' => $request->input('description'),
            'color' => $request->input('color', null),
            'event_date' => $request->input('event_date'),
            'repeat' => $request->input('repeat', false),
            'repeat_type' => $request->input('repeat_type', null),
        ]);

        return response()->json(['message' => 'Event created', 'event' => $event], 201);
    }
    public function calendarPost()
    {
        return Inertia::render('Auth/CalendarPost');
    }
}

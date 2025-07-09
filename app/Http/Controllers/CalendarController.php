<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $event = array();
        $events = Event::all();
        foreach($events as $booking){
            $event[] = [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
            ];
        }

        return view('event', ['event' => $event]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $conflict = Event::where(function ($query) use ($request) {
        $query->whereBetween('start_date', [$request->start_date, $request->end_date])
              ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
              ->orWhere(function ($query) use ($request) {
                  $query->where('start_date', '<', $request->start_date)
                        ->where('end_date', '>', $request->end_date);
              });
        })->exists();

        if ($conflict) {
            return response()->json([
                'errors' => ['title' => ['This time slot has already been booked.']]
            ], 422);
        }

        $events = Event::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($events);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Event not found.'], 404);
        }

        $conflict = Event::where('id', '!=', $id)
        ->where(function ($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                  ->orWhere(function ($query) use ($request) {
                      $query->where('start_date', '<', $request->start_date)
                            ->where('end_date', '>', $request->end_date);
                  });
        })->exists();

        if ($conflict) {
            return response()->json([
                'errors' => ['title' => ['This time slot is already taken.']]
           ], 422);
        }

        $event->update([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Event not found.'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully.']);
    }
}

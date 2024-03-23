<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(Event::with('user', 'attendee')->get());

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time'
        ]);

        $event = Event::create([...$data,'user_id' => 1]);

        return new EventResource($event);
    }

    public function show(Event $event)
    {
        $event->load('user', 'attendee');
        return new EventResource($event);
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date|after:start_time'
        ]);

        $event->update([...$data]);

        return new EventResource($event);
    }

    public function destroy(Event $event)
    {
        $event->delete();
//        return response()->json([
//            'message' => 'Event deleted successfully'
//            ]);

        return response(status: 204);
    }
}

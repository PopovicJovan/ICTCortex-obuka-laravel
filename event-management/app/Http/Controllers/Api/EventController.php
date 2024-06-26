<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EventController extends Controller
{
    use CanLoadRelationships;
    use AuthorizesRequests;

    private array $relations = ['user', 'attendees', 'attendees.user'];

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Attendee::class, 'attendee');
    }

    public function index()
    {
        $query = $this->loadRelationships(Event::query());
        return EventResource::collection($query->latest()->paginate());
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time'
        ]);

        $event = Event::create([...$data,'user_id' => $request->user()->id]);

        return new EventResource($this->loadRelationships($event));

    }

    public function show(Event $event)
    {
        return new EventResource($this->loadRelationships($event));
    }

    public function update(Request $request, Event $event)
    {
//        if(Gate::denies('update-event', $event)){
//            abort(403, 'You are not authorized!');
//        }

//        $this->authorize('update-event', $event);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date|after:start_time'
        ]);

         $event->update([...$data]);

        return new EventResource($this->loadRelationships($event));
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

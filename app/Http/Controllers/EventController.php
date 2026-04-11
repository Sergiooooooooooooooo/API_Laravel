<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvenRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::with('venue')->paginate();    
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(EvenRequest $request)
    {
        $event = Event::create($request->validated());
        return response()->json(['event' => $event], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return response()->json(['event' => $event->load('venue')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EvenRequest $request, Event $event)
    {
        $event->update($request->all());
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(['message' => 'Event deleted successfully']);   
    }

    public function indexActiveEvents(){
        return Event::with('venue')->where('event_status', true)->
        orWhere('event_name', 'like', '%a%')->
        get();  
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Event;
use App\Models\InterestedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{

    public function index()
    {
        $events = Event::with('community')->paginate(2);
        // return $events;
        return view('admin.events.index', [
            'events' => $events,
            'title' => 'Show All Events'
        ]);
    }
    public function create()
    {
        $event = new Event();
        $communites = Community::get();
        return view('admin.events.create', [
            'title' => 'create New Event',
            'communites' => $communites,
            'event' => $event
        ]);
    }

    public function store(Request $request)
    {
        $event = Event::create($request->all());
        return redirect()->route('events.index')->with('create', 'the event is created');
    }

    public function show($id)
    {
    }
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $communites = Community::get();
        return view('admin.events.edit', [
            'event' => $event,
            'communites' => $communites,
            'title' => 'Edit The Event'
        ]);
    }
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('events.index')->with('edit', 'the event is updated');
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('delete', 'the event is deleted');
    }

    
}
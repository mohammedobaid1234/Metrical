<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\InterestedUser;
use App\Notifications\SendReminderForEventNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();
        return [
            'status' => 200,
            'message' => __('messages.events'),
            'data' => $events,
        ];
    }

    public function eventsByCommunity($id)
    {
        $events = Event::where('community_id', $id)->exists();
        if ($events) {
            return [
                'status' => 200,
                'message' => __('messages.events'),
                'data' => Event::where('community_id', $id)->get(),
            ];
        }
        return [
            'status' => 404,
            'message' => __('messages.events.notfound'),
            'data' => $events,
        ];
    }

    // interested or not

    public function interested(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $request->validate([
            'status' => 'required',
            'event_id' => 'required' 
        ]);
        
        $request->merge([
            'user_id' => $user->id
        ]);
        // $user->notify(new SendReminderForEventNotification(Event::find($request->event_id)));
        InterestedUser::create($request->all());
        if($request->status == 1){
            return [
                'status' => 200,
                'message' => __('messages.interested'),
                'data' => '',
            ];
        }

        return [
            'status' => 200,
            'message' => __('messages.notInterested'),
            'data' => '',
        ];
    }
}

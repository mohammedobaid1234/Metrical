<?php

namespace App\Jobs;

use App\Models\Event;
use App\Models\User;
use App\Notifications\SendReminderForEventNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Testing\Fakes\NotificationFake;

class InterstedEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $events =  Event::with('users')->whereDate('start_date', Carbon::now()->addDays(7))->get();
        foreach($events as $event){
            foreach($event->users as $user){
                
                $user->notify(new SendReminderForEventNotification($user->pivot->event_id));
            }
            
        }
    }
}

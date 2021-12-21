<?php

namespace App\Jobs;

use App\Models\Rent;
use App\Models\User;
use App\Notifications\SendReminderToTanentNotificatio;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendReminderToTanentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $events =  Rent::with('tenet')->whereDate('to', Carbon::now()->addDays(7))->get();
       
        foreach($events as $event){
            $user =  $event->tenet;
            $user->notify(new SendReminderToTanentNotificatio($event));

            // foreach($event->tenet as $user){
               
                
            // }
            
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}

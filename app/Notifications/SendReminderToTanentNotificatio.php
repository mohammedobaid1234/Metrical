<?php

namespace App\Notifications;

use App\Models\Property;
use App\Models\Rent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendReminderToTanentNotificatio extends Notification
{
    use Queueable;

    protected $property;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($property)
    {
       
        $this->property = $property;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('metrical@info', 'Metrical Member')
            ->line(__('remember you subtribe in tenet :name will finish :date', ['name' => $this->property->property->name_en , 'date' => $this->property->to]))
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class FreeTrialExpiration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        ->subject(('Your free trial subscription is expired.'))
        ->line(" <h2> YOUR FREE TRIAL SUBSCRIPTION EXPIRED</h2> " )
        ->greeting('Dear'.' '.$this->data['first_name'].',')
        ->line("The trial period for Cinevesture.com has expired, but your progress has been saved and is still available. Everyone gets busy, and you may not have had enough time to evaluate Cinevesture." )
        ->line(' <b>Ready to Upgrade?</b>')
        ->line(' Upgrading your membership is simple. Our plans start at ₹9000 /year.')
        ->line('[Login]('.route('login').') to upgrade')        
        ->salutation('Team Cinevesture');
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
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

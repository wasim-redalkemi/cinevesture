<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class SubRenewalBeforeExpiration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
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
                    ->subject(('Your '.$this->data['plan_name'].' subscription expiring soon.'))
                    ->line(" <h2> SUBSCRIPTION CONFIRMATION </h2> " )
                    ->greeting('Dear'.' '.$this->data['first_name'].',')
                    ->line("We hope you are enjoying your subscription, which will renew soon." )
                    ->line('Starting from '.$this->data['plan_start_date'].' , your subscription automatically renews for '.' ' .$this->data['currency'] .$this->data['plan_amount'].' '.'/year. To avoid being charged, you must cancel at least one day before each renewal date.')
                    ->line('To keep your subscription, no further action is needed.')
                    ->line('Sincerely, ')        
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

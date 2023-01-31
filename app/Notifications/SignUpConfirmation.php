<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SignUpConfirmation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data =$data;
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
        ->subject('Welcome to Cinevesture')
        ->greeting('Hi'.' '.$this->data['first_name'].',')
        ->line('Welcome to Cinevesture! We’re excited to have you on board.')
        ->line('We’re here to bridge the gap in the film and media industry by helping you build your network and find interesting people and projects to work with.')
        ->line('Cinevesture is about:')
        ->line("Meeting the right people")        
        ->line("Sharing interesting projects")        
        ->line("Finding the right talent")        
        ->line("Learning new skills")        
        ->line('Best,')        
        ->salutation('Team Cinevesture')
        ->action('Login' ,route('plans-view'));
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

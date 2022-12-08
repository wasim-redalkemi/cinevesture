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
        ->line('We are here to help you build your network in the media industry to find interesting people and projects to work with.')
        ->line('Cinevesture is about:')
        ->line("<p>- <span>  </span>Meeting the right people</p>
        <p>-   Sharing interesting projects</p>
        <p>-   Finding the right talent</p>
        <p>-   Learning new skills</p>")
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

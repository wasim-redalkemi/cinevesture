<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyOtp extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $data;
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
        if (!isset($this->data['first_name']) || empty($this->data['first_name'])) {
            $this->data['first_name'] = 'User';
        }
        return (new MailMessage)
        ->subject('Your verification code for Cinevesture')
        ->greeting('Hi'.' '.$this->data['first_name'].',')
        ->line('Your email verification code is')
        ->line("<span class='user_otp'>".$this->data['otp']."</span>")
        ->line("Enter the verification code on the website to complete your registration. If you need to log in again, please <a href=".route('login').">click here</a> .")
        ->line('Best,')        
        ->salutation('Team Cinevesture');
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

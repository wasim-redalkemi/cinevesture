<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyOTPForgetPassword extends Notification
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
        return (new MailMessage)
        ->subject('Reset your password for Cinevesture')
        ->greeting('Hi'.' '.$this->data['first_name'].',')
        ->line('Your reset password  verification code is')
        ->line("<span class='user_otp'>".$this->data['otp']."</span>")

        // ->action('Notification Action', url('/'))
        ->line('Enter the verification code on the website to complete password change.')
        ->line("If you ignore this message, your password will not be changed. If you didn't request a password reset, let us know.")
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

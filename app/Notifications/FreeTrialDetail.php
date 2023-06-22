<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FreeTrialDetail extends Notification
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
                    ->line("Subject: Cinevesture.com Subscription Confirmation" )
                    ->line(" <h2> SUBSCRIPTION CONFIRMATION </h2> " )
                    ->greeting('Dear'.' '.$this->data['first_name'].',')
                    ->line("You have accepted the following offer:" )
                    ->line(' <b>Subscription</b>'." ".$this->data['plan_name']. " ".'Plan.')
                    ->line(' <b> Date Accepted</b>  '  .$this->data['Start_date'])
                    ->line('<b>Trial </b> Free for 1 month, starting '  .$this->data['Start_date'])        
                    ->line('<b>Subscription Price </b> '.' ' .$this->data['amount_type'] .$this->data['plan_amount'].'/year, starting one month from the trial date')        
                    ->line('Your subscription will be up for renewal for'.' '.$this->data['amount_type'] .' '.$this->data['plan_amount'].'/year, starting <one month 
                    from the trial date> until cancelled. If you cancel during the 1-month free trial period,
                     you will immediately lose access to Cinevesture.com and the remainder of your trial.
                      You cannot reactivate this trial.')
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

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Symfony\Component\VarDumper\Cloner\Data;

class MembershipConfarmation extends Notification
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
        ->subject('Your Cinevesture membership is now active!')
        ->greeting('Hi'.' '.$this->data['first_name'].',')
        ->line('Welcome to Cinevesture! Your membership is now active')
        ->line('Plan name:     '.$this->data['plan_name'])
        ->line('Billed to:     '.$this->data['first_name'])
        ->line('Total charged:     '.$this->data['currency'].$this->data['plan_amount'])
        ->line("Your Cinevesture membership is active today, so you can get started whenever you're ready. Just a few reminders about your membership")
        ->line('<h4>Create your profile</h4>')
        ->line("You can create your profile by writing about your experience, showcasing your portfolio, asking your friends and colleagues on Cinevesture to endorse you and uploading an introduction video")
        ->line('<h4>List a Project</h4>')
        ->line("Whether you’re looking for an investor, talent, or crew, you can list your project to get the conversation started. Don’t forget to add videos, images and milestones so that people can see what’s brewing.")
        ->line('<h4>Apply for jobs</h4>')
        ->line("We make it easier for you to find work in this gig economy! Find the right job that fits your skills and interests and apply with your profile and cover letter.")
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

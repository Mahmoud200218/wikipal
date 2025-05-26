<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectNewsUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }


    public function toDatabase(object $notifiable)
    {
        return [
            'category' => 'News Rejected',
            'title' => 'Your News Submission Was Rejected',
            'body' => 'We appreciate your effort, but unfortunately your recent news submission did not meet the publishing criteria on WikiPal. You may review our guidelines and submit again.',
            'user_name' => $notifiable->name,
            'user_email' => $notifiable->email,
            'user_avatar' => $notifiable->avatar,
            'url' => route('dashboard'),
            'view' => route('dashboard'),
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

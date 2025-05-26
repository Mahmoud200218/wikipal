<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptNewsUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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


    public function toDatabase(object $notifiable)
    {
        return [
            'category' => 'News Accepted',
            'title' => 'Your News Has Been Accepted!',
            'body' => 'Good news! The article you submitted has been reviewed and accepted by our editorial team on WikiPal. Thank you for your contribution to the platform.',
            'user_name' => $notifiable->name,
            'user_email' => $notifiable->email,
            'user_avatar' => $notifiable->avatar,
            'url' => route('dashboard'),
            'view' => route('dashboard'),
        ];
    }

    /**
     * Get the mail representation of the notification.
     * Accept: <i class="fas fa-check-circle"></i>
     * Reject: <i class="fas fa-times-circle"></i>
     * 
     * Reject: <i class="fas fa-times-circle"></i>
     * 
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

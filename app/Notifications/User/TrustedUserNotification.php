<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrustedUserNotification extends Notification
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
            'category' => 'Trusted User',
            'title' => 'You Have Been Granted the Trusted User Badge!',
            'body' => 'Congratulations, your account has been officially marked as trusted on WikiPal. This badge reflects your credibility and active contributions to the platform.',
            'user_name' => $notifiable->name,
            'user_email' => $notifiable->email,
            'user_avatar' => $notifiable->avatar,
            'url' => route('user.profile'),
            'view' => route('user.profile'),
        ];
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

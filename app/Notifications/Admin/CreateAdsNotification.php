<?php

namespace App\Notifications\Admin;

use App\Models\Ads;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateAdsNotification extends Notification
{
    use Queueable;

    protected $ads;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ads $ads)
    {
        $this->ads = $ads;
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
            'category' => 'Advertisements',
            'title' => "A new ad has been added by: " . $this->ads->admin->name,
            'body' => $this->ads->link,
            'user_name' => $this->ads->admin->name,
            'user_email' => $this->ads->admin->email,
            'user_avatar' => $this->ads->admin->avatar,
            'url' => route('admin.dashboard'),
            'view' => route('admin.manage.ads', $this->ads->id),
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

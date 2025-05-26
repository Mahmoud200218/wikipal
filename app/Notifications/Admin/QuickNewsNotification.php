<?php

namespace App\Notifications\Admin;

use App\Models\Admin\QuickNews;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuickNewsNotification extends Notification
{
    use Queueable;
    protected $quickNews;

    /**
     * Create a new notification instance.
     */
    public function __construct(QuickNews $quickNews)
    {
        $this->quickNews = $quickNews;
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
            'category' => 'Quick News',
            'title' => "A new 'quick news' has been added by: " . $this->quickNews->admin->name,
            'body' => $this->quickNews->title,
            'user_name' => $this->quickNews->admin->name,
            'user_email' => $this->quickNews->admin->email,
            'user_avatar' => $this->quickNews->admin->avatar,
            'url' => route('admin.dashboard'),
            'view' => route('admin.manage.quick_news', $this->quickNews->id),
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

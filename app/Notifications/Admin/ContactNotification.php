<?php

namespace App\Notifications\Admin;

use App\Models\Front\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    protected $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
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
            'category' => 'Feedback',
            'title' => $this->contact->subject,
            'body' => $this->contact->message,
            'user_name' => $this->contact->user->name,
            'user_email' => $this->contact->user->email,
            'user_avatar' => $this->contact->user->avatar,
            'url' => route('admin.dashboard'),
            'view' => route('admin.contact.details', $this->contact->id),
        ];
    }


    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            //         ->subject('New Contact Request Received')
            //         ->greeting('Hello,')
            //         ->line("We have received a new contact request submitted by **{$this->contact->user->name}**.")
            //         ->line("Email Address: {$this->contact->user->email}")
            //         ->line("You can review and respond to the request by accessing the admin panel.")
            //         ->action('View Contact Requests', url('/admin/manage/contacts'))
            //         ->line('Thank you for your continued support and for being part of WikiPal.')
            //         ->salutation('Best regards,  
            // WikiPal Team')
        ;
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

<?php

namespace App\Mail;

use App\Models\Front\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Contact Request Received')
            ->view('emails.contact_notification')
            ->with([
                'contact' => $this->contact,
            ]);
    }
}

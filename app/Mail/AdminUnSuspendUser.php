<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminUnSuspendUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Account Has Been Reactivated')
            ->view('emails.un_suspended_user')
            ->with([
                'user' => $this->user,
            ]);
    }
}

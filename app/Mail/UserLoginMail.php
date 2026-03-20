<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserLoginMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('waeljr@gmail.com', 'Eraasoft Team'),
            to: [new Address($this->user->email, $this->user->name)],
            subject: 'Login Notification',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.login_mail',
            with: [
                'user' => $this->user,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

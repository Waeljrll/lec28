<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user, public Product $product)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('waeljr@gmail.com', 'Eraasoft Team'),
            to: [new Address($this->user->email, $this->user->name)],
            subject: 'New Product Created',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product_created_mail',
            with: [
                'user' => $this->user,
                'product' => $this->product,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Your Password',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'mail.user.password',
        );
    }

    public function attachments()
    {
        return [];
    }
}

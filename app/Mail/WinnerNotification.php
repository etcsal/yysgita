<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WinnerNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $kandidat;
    /**
     * Create a new message instance.
     */
    public function __construct($kandidat)
    {
        $this->kandidat = $kandidat;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Winner Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
{
    return new Content(
        view: 'emails.winner',  // Replace this with the actual path to the Blade file
        with: ['kandidat' => $this->kandidat]  // Pass the kandidat object to the view
    );
}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

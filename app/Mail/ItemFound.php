<?php

namespace App\Mail;

use App\Models\FoundItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ItemFound extends Mailable
{
    use Queueable, SerializesModels;

        // private FoundItem $item;

    /**
     * Create a new message instance.
     */

    public $subject, $body, $finderEmail;
    
    public function __construct($subject, $body, $finderEmail)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->finderEmail = $finderEmail;    
    
    
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.index',
            // with: [
            //     'url' => route('founditem.show'),
            // ],
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

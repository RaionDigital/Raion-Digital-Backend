<?php

namespace App\Mail;

use App\Models\ContactSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactSubmitted extends Mailable
{
    use Queueable, SerializesModels;
    public $contactSubmission;


    /**
     * Create a new message instance.
     */
    public function __construct(ContactSubmission $contactSubmission)
    {
        $this->contactSubmission = $contactSubmission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $contactSubmission = ContactSubmission::latest()->first();

        return new Envelope(
            subject: $contactSubmission->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }
 public function build()
    {
        return $this->from('info@raiondigital.com')->view('email.contact');
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

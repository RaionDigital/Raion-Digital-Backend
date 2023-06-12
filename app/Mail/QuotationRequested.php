<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;


class QuotationRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;
    /**
     * Create a new message instance.
     */
    public function __construct(
        Quote $quote
    ) {
        $this->quote = $quote;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $quote = Quote::latest()->first();
        return new Envelope(
            subject: 'Quotation Request from' .' '.$quote->email,
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'email.quotation',
    //     );
    // }

    public function build()
    {
        return $this->from('info@raiondigital.com')->view('email.quotation');
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

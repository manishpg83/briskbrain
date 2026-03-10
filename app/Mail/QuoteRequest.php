<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequest extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    public $subject;

    /**
     * Create a new message instance.
     */
   public function __construct(array $data, $subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.quote_request')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'designation' => $this->data['designation'],
                        'number' => $this->data['number'],
                        'country' => $this->data['country'],
                        'company' => $this->data['company'],
                        'requirement' => $this->data['requirement'],
                        'description' => $this->data['description'],


                    ])
                    ->replyTo($this->data['email']);
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope();
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.quote_request',
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

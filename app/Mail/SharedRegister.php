<?php

namespace App\Mail;

use App\Models\Information;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SharedRegister extends Mailable
{
    use Queueable, SerializesModels;

    protected Subscriber $subscriber;
    protected Information $information;


    /**
     * Create a new message instance.
     */
    public function __construct($information ,$subscriber)
    {

        $this->subscriber = $subscriber;
        $this->information = $information;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de Registro',
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.email.sharedRegister',
            with: [
                'subscriber' => $this->subscriber,
                'information' => $this->information,
            ],
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
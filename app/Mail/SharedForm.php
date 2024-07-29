<?php

namespace App\Mail;

use App\Models\Form;
use App\Models\Information;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SharedForm extends Mailable
{
    use Queueable, SerializesModels;

    protected Information $information;
    protected Form $formUser;

    /**
     * Create a new message instance.
     */
    public function __construct($information, $formUser)
    {

        $this->information = $information;
        $this->formUser = $formUser;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de Registro',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.email.sharedForm',
            with: [
                'information' => $this->information,
                'user' => $this->formUser,
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

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MonthlyPaymentFailedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $reactivationUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($reactivationUrl, $user)
    {
        $this->user = $user;
        $this->reactivationUrl = $reactivationUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Star Pasture - Payment Failed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.monthly_payment_failed_mail',
            with: [
                'user' => $this->user,
                'reactivationUrl' => $this->reactivationUrl,
            ]
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

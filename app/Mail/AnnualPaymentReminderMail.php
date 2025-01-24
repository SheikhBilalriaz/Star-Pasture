<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnualPaymentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $paymentUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($paymentUrl, $user)
    {
        $this->user = $user;
        $this->paymentUrl = $paymentUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Star Pasture - Payment Reminder',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.annual_payment_reminder',
            with: [
                'user' => $this->user,
                'paymentUrl' => $this->paymentUrl,
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

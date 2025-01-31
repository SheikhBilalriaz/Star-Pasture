<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Class AnnualPaymentReminderMail
 *
 * Handles the creation and customization of the email 
 * sent remainder to users when their account yearly subscription is expired.
 */
class AnnualPaymentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    // Public properties to pass data to the email view
    public $user;
    public $paymentUrl;

    /**
     * Constructor to initialize user and payment URL.
     *
     * @param string $paymentUrl The payment link for the user
     * @param object $user The user object containing user details
     */
    public function __construct($paymentUrl, $user)
    {
        $this->user = $user;
        $this->paymentUrl = $paymentUrl;
    }

    /**
     * Define the email envelope, including the subject.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Star Pasture - Payment Reminder',
        );
    }

    /**
     * Define the email content, including the view and data passed to it.
     *
     * @return \Illuminate\Mail\Mailables\Content
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
     * Define any attachments for the email.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

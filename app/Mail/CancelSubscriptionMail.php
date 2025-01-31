<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Class CancelSubscriptionMail
 *
 * Handles the creation and customization of the email 
 * sent to users when their account is deactivated.
 */
class CancelSubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    // Public properties to pass data to the email view
    public $user;
    public $reactivationUrl;

    /**
     * Constructor to initialize user and reactivation URL.
     *
     * @param string $reactivationUrl The reactivation link for the user
     * @param object $user The user object containing user details
     */
    public function __construct($reactivationUrl, $user)
    {
        $this->user = $user;
        $this->reactivationUrl = $reactivationUrl;
    }

    /**
     * Define the email envelope, including the subject.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Star Pasture - Account Deactivated',
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
            view: 'emails.cancel_subscription_mail',
            with: [
                'user' => $this->user,
                'reactivationUrl' => $this->reactivationUrl,
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

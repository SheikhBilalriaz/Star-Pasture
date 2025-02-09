<?php

namespace App\Models;

use App\Mail\AnnualPaymentReminderMail;
use App\Mail\CancelSubscriptionMail;
use App\Mail\MonthlyDeactivationMail;
use App\Mail\MonthlyPaymentSuccessfull;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use App\Mail\UserVerificationMail;

/**
 * The User model represents the users in the application.
 * Implements MustVerifyEmail to support email verification.
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * These fields can be filled during model creation or updates.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'is_active',
        'subscription_expires_on',
        'stripe_customer_id',
        'monthly_activation_expires_on',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * These fields will not be included when the model is converted to an array or JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * These fields are automatically converted to the specified type.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'subscription_expires_on' => 'datetime',
    ];

    /**
     * Define a one-to-many relationship with the UserPayment model.
     * A user can have multiple payments associated with them.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(UserPayment::class);
    }

    /**
     * Define a one-to-one relationship with the PaymentTries model.
     * A user can have one payment try record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tries()
    {
        return $this->hasOne(PaymentTries::class);
    }

    /**
     * Define a one-to-one relationship with the EmailCount model.
     * A user can have one email count record to track their email-related statistics.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emailCount()
    {
        return $this->hasOne(EmailCount::class);
    }

    /**
     * Get the ad listings for the user.
     */
    public function adListings()
    {
        return $this->hasMany(AdListing::class);
    }

    /**
     * Generate a verification URL with expiration time (15 minutes)
     * and send the verification email to the user.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        // Generate the verification URL
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(15),
            ['id' => $this->id, 'hash' => sha1($this->email)]
        );

        // Send the verification email
        Mail::to($this->email)->send(new UserVerificationMail($verificationUrl, $this));
    }

    /**
     * Send an account deactivation notification due to subscription expiration.
     * Generates a reactivation URL containing an encrypted email.
     *
     * @return void
     */
    public function sendAccountDeactivationNotification()
    {
        // Encrypt the user's email
        $encryptedEmail = urlencode(Crypt::encryptString($this->email));

        // Generate the URL with the encrypted email
        $reactivationUrl = route('annual_payment.form', ['email' => $encryptedEmail]);

        // Send the notification email with the generated link
        Mail::to($this->email)->send(new CancelSubscriptionMail($reactivationUrl, $this));
    }

    /**
     * Send an annual subscription reminder notification.
     * Generates a payment URL containing an encrypted email.
     *
     * @return void
     */
    public function sendAnnualSubscriptionNotification()
    {
        // Encrypt the user's email
        $encryptedEmail = urlencode(Crypt::encryptString($this->email));

        // Generate the URL with the encrypted email
        $paymentUrl = route('annual_payment.form', ['email' => $encryptedEmail]);

        // Send the notification email with the generated link
        Mail::to($this->email)->send(new AnnualPaymentReminderMail($paymentUrl, $this));
    }

    /**
     * Send a notification for monthly subscription deactivation.
     * Generates a reactivation URL containing an encrypted email.
     *
     * @return void
     */
    public function sendMonthlyDeactivationNotification()
    {
        // Encrypt the user's email
        $encryptedEmail = urlencode(Crypt::encryptString($this->email));

        // Generate the URL with the encrypted email
        $reactivationUrl = route('monthly_payment.form', ['email' => $encryptedEmail]);

        // Send the notification email with the generated link
        Mail::to($this->email)->send(new MonthlyDeactivationMail($reactivationUrl, $this));
    }

    /**
     * Placeholder for sending monthly payment failure notifications.
     * Can be expanded with specific notification logic.
     *
     * @return void
     */
    public function sendMonthlyPaymentFailedNotification() {}

    /**
     * Send a notification for successful monthly payment.
     * Generates a dashboard URL for user access.
     *
     * @return void
     */
    public function sendMonthlyPaymentSuccessNotification()
    {
        // Generate the URL
        $dashboardUrl = route('/');

        // Send the notification email with the generated link
        Mail::to($this->email)->send(new MonthlyPaymentSuccessfull($dashboardUrl, $this));
    }
}

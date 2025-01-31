<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserPayment;
use Exception;
use Illuminate\Console\Command;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Log;

class UserSubscriptionHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-subscription-handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handles user payment renewals and subscription expirations.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Handle annual and monthly subscriptions separately
        $this->update_annual_subscription();
        $this->update_monthly_subscription();
    }

    /**
     * Handle logic for updating annual subscriptions.
     */
    private function update_annual_subscription()
    {
        // Fetch users whose annual and monthly subscriptions have expired but are still active
        $users = User::where('subscription_expires_on', '<', now())
            ->where('monthly_activation_expires_on', '<', now())
            ->where('is_active', true)
            ->get();

        foreach ($users as $user) {
            // Check if more than two reminder emails have already been sent
            if ($user->emailCount->email_count > 2) {
                // Deactivate the user and notify them
                $user->is_active = false;
                $user->save();
                $user->sendAccountDeactivationNotification();
                continue;
            }

            // Send a subscription renewal reminder
            $user->sendAnnualSubscriptionNotification();

            // Increment the email count
            $user->emailCount->email_count += 1;
            $user->emailCount->save();
        }
    }

    /**
     * Handle logic for updating monthly subscriptions.
     */
    private function update_monthly_subscription()
    {
        // Set the Stripe API key for payment processing
        Stripe::setApiKey(config('services.stripe.secret'));

        // Fetch users with active annual subscriptions but expired monthly activations
        $users = User::where('subscription_expires_on', '>', now())
            ->where('monthly_activation_expires_on', '<', now())
            ->get();

        foreach ($users as $user) {
            // Check if the user has more than two failed payment attempts
            if ($user->tries->failed_tries > 2) {
                // Deactivate the user and notify them
                $user->is_active = false;
                $user->save();
                $user->sendMonthlyDeactivationNotification(); //TODO: check this before finalizing
                continue;
            }

            try {
                // Attempt to charge the user for the monthly activation fee
                $charge = Charge::create([
                    'customer' => $user->stripe_customer_id,
                    'amount' => config('services.stripe.monthly_amount') * 100,
                    'currency' => 'usd',
                    'description' => 'Monthly Activation Fee',
                ]);

                // Check if the payment was successful
                if ($charge->status !== 'succeeded') {
                    $user->tries->failed_tries += 1;
                    $user->tries->save();
                    $user->sendMonthlyPaymentFailedNotification(); //TODO: check this before finalizing
                    continue;
                }

                // Record successful payment in the database
                UserPayment::create([
                    'user_id' => $user->id,
                    'transaction_id' => $charge->id,
                    'amount' => $charge->amount / 100,
                    'currency' => $charge->currency,
                    'payment_type' => 'monthly'
                ]);

                // Reset failed tries count and notify user of success
                $user->tries->failed_tries = 0;
                $user->tries->save();
                $user->sendMonthlyPaymentSuccessNotification(); //TODO: check this before finalizing
            } catch (Exception $e) {
                // Log the exception for debugging and alert purposes
                Log::error("Payment failed for user ID {$user->id}: " . $e->getMessage());
                $user->tries->failed_tries += 1;
                $user->tries->save();
            }
        }
    }
}

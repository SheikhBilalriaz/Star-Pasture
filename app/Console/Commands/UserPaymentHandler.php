<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserPayment;
use Illuminate\Console\Command;
use Stripe\Charge;

class UserPaymentHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-payment-handler';

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
        // Expired subscription users
        // $users_subscription_expired = User::where('subscription_expires_on', '<=', now())->get();

        // foreach ($users_subscription_expired as $user) {
        //     $user->is_active = false;
        //     $user->save();
        //     //TODO: Send reminder for payment renewal
        // }

        // $user_monthly_expiry = User::where('monthly_activation_expires_on', '<=', now())
        //     ->where('subscription_expires_on', '>', now())
        //     ->get();

        // foreach ($user_monthly_expiry as $user) {
        //     if ($user->tries()->failed_tries > 2) {
        //         if (!$user->is_active) {
        //             //TODO: Send reminder for payment renewal
        //             continue;
        //         }
        //         $user->is_active = false;
        //         $user->save();
        //         //TODO: Send reminder about expiry
        //         continue;
        //     }

        //     // Charge the customer
        //     $charge = Charge::create([
        //         'customer' => $user->stripe_customer_id,
        //         'amount' => config('services.stripe.monthly_amount') * 100,
        //         'currency' => 'usd',
        //         'description' => 'Monthly Activation Fee',
        //     ]);

        //     // Assuming charge has a status attribute
        //     if ($charge->status == 'succeeded') {
        //         // Process successful payment
        //         UserPayment::create([
        //             'user_id' => $user->id,
        //             'transaction_id' => $charge->id,
        //             'amount' => $charge->amount / 100,
        //             'currency' => $charge->currency,
        //             'payment_type' => 'monthly'
        //         ]);

        //         // Reset failed tries on successful payment
        //         $user->tries()->failed_tries = 0;
        //         $user->tries()->save();
        //         continue;
        //     }

        //     $user->tries()->failed_tries += 1;
        //     $user->tries()->save();
        //     //TODO: Send remainder for failed
        //     continue;
        // }
    }
}

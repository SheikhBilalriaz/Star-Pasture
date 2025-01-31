<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class MonthlyPaymentController extends Controller
{
    public function monthly_payment_form($email)
    {
        // Decrypt the email for use in the form.
        $decryptedEmail = Crypt::decryptString(urldecode($email));

        // Return the view with both the encrypted and decrypted email
        return view('frontend.monthly_payment_form', ['encryptedEmail' => $email, 'email' => $decryptedEmail]);
    }

    public function monthly_payment_form_submit(Request $request, $email)
    {
        // Validate the request input.
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'stripeToken' => ['required', 'string'],
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));
        DB::beginTransaction();

        try {
            // Decrypt the email for validation purposes.
            $decryptedEmail = Crypt::decryptString(urldecode($email));

            // Check if the provided email matches the decrypted email.
            if ($request->input('email') !== $decryptedEmail) {
                DB::rollBack();
                return redirect()->back()
                    ->withErrors(['email' => 'Invalid credentials.'])
                    ->withInput();
            }

            // Retrieve the user by email.
            $user = User::where('email', $decryptedEmail)->first();

            // Check if the user exists and the password matches.
            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                DB::rollBack();
                return redirect()->back()
                    ->withErrors(['email' => 'Invalid credentials.'])
                    ->withInput();
            }

            // Retrieve the Stripe customer object using the user's Stripe customer ID.
            $customer = Customer::retrieve($user->stripe_customer_id);

            // If the customer object does not exist, return an error.
            if (!$customer) {
                DB::rollBack();
                return redirect()->back()
                    ->withErrors(['email' => 'User not found'])
                    ->withInput();
            }

            // Update the customer's payment source with the provided Stripe token.
            $customer->source = $request->input('stripeToken');
            $customer->save();

            // Create a Stripe charge for the annual subscription fee.
            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => config('services.stripe.monthly_amount') * 100,
                'currency' => 'usd',
                'description' => 'Monthly Activation Fee',
            ]);

            // Check if the charge was successful.
            if ($charge->status !== 'succeeded') {
                return redirect()->back()
                    ->withErrors(['stripe' => 'Payment processing failed. Please try again.'])
                    ->withInput();
            }

            // Activate the user's account and extend the subscription expiration date by one year.
            $user->is_active = true;
            $user->monthly_activation_expires_on = $user->monthly_activation_expires_on->addMonth();
            $user->save();

            // Reset the email count for the user.
            $user->tries->failed_tries = 0;
            $user->tries->save();

            DB::commit();

            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('admin.login')->with('status', 'User activation updated.');
            } elseif ($user->role === 'subscriber') {
                return redirect()->route('login')->with('status', 'User activation updated.');
            }
        } catch (\Stripe\Exception\ApiErrorException $e) {
            Log::error('Stripe API error during user updation: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['stripe' => 'Payment processing failed. Please try again.'])
                ->withInput();
        } catch (Exception $e) {
            Log::error('User updation failed: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['general' => 'An error occurred during user updation. Please try again.'])
                ->withInput();
        }
    }
}

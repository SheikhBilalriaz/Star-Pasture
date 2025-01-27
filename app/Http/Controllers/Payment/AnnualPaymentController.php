<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\EmailCount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class AnnualPaymentController extends Controller
{
    /**
     * Display the annual payment form.
     *
     * @param string $email The encrypted email of the user.
     * @return \Illuminate\View\View The payment form view.
     */
    public function annual_payment_form($email)
    {
        // Decrypt the email for use in the form.
        $decryptedEmail = Crypt::decryptString(urldecode($email));

        // Return the view with both the encrypted and decrypted email
        return view('frontend.annual_payment_form', ['encryptedEmail' => $email, 'email' => $decryptedEmail]);
    }

    /**
     * Handle the submission of the annual payment form.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request.
     * @param string $email The encrypted email of the user.
     * @return \Illuminate\Http\RedirectResponse A redirect response based on the result.
     */
    public function annual_payment_form_submit(Request $request, $email)
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
                'amount' => config('services.stripe.annual') * 100,
                'currency' => 'usd',
                'description' => 'Annual Subscription Fee',
            ]);

            // Check if the charge was successful.
            if ($charge->status !== 'succeeded') {
                return redirect()->back()
                    ->withErrors(['stripe' => 'Payment processing failed. Please try again.'])
                    ->withInput();
            }

            // Activate the user's account and extend the subscription expiration date by one year.
            $user->is_active = true;
            $user->subscription_expires_on = $user->subscription_expires_on->addYear();
            $user->save();

            // Reset the email count for the user.
            $user->emailCount->email_count = 0;
            $user->emailCount->save();

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

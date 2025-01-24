<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailCount;
use App\Models\PaymentTries;
use App\Models\User;
use App\Models\UserPayment;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

/**
 * This controller handles the registration of new users,
 * including payment processing using Stripe, and assigns default roles.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * The redirection path after successful registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Constructor to apply the guest middleware.
     * Ensures only unauthenticated users can access the registration functionality.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validate the registration request data.
     * Ensures that all required fields are present and correctly formatted.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:subscriber'],
            'stripeToken' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after validation.
     *
     * @param  array  $data
     * @return \App\Models\User|\Illuminate\Http\RedirectResponse
     */
    protected function create(array $data)
    {
        return $this->registerUser($data);
    }

    /**
     * Handle user registration, including Stripe integration and user creation.
     * This method also ensures transactional consistency using database transactions.
     *
     * @param  array  $data
     * @return \App\Models\User|\Illuminate\Http\RedirectResponse
     */
    protected function registerUser(array $data)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        DB::beginTransaction();

        try {
            // Create a Stripe customer
            $customer = Customer::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'source' => $data['stripeToken'],
            ]);

            // Process the payment
            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => config('services.stripe.annual') * 100,
                'currency' => 'usd',
                'description' => 'Annual Subscription Fee',
            ]);

            // Check if the charge was successful
            if ($charge->status !== 'succeeded') {
                DB::rollBack();
                return redirect()->back()
                    ->withErrors(['stripe' => 'Payment processing failed. Please try again.'])
                    ->withInput();
            }

            // Create the user in the database
            $user = User::create([
                'name' => $data['name'],
                'role' => $data['role'] ?? 'subscriber',
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_active' => true,
                'subscription_expires_on' => now()->addYear(),
                'stripe_customer_id' => $customer->id,
                'monthly_activation_expires_on' => now()->addMonth(),
            ]);

            // Record the payment details
            UserPayment::create([
                'user_id' => $user->id,
                'transaction_id' => $charge->id,
                'amount' => $charge->amount / 100,
                'currency' => $charge->currency,
                'payment_type' => 'annual',
            ]);

            // Initialize payment tries for the user
            PaymentTries::create([
                'user_id' => $user->id,
                'failed_tries' => 0,
            ]);

            // Initialize email count for the user
            EmailCount::create([
                'user_id' => $user->id,
                'email_count' => 0,
            ]);

            DB::commit();
            return $user;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            Log::error('Stripe API error during registration: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['stripe' => 'Payment processing failed. Please try again.'])
                ->withInput();
        } catch (Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['general' => 'An error occurred during registration. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Handle post-registration redirection logic based on user roles.
     * Ensures users are redirected to the appropriate page after registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function registered(Request $request, $user)
    {
        if (!$user instanceof User) {
            return $user;
        }

        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect()->route('admin.login')->with('status', 'Please verify your email.');
        } elseif ($user->role === 'subscriber') {
            return redirect()->route('login')->with('status', 'Please verify your email.');
        }

        return redirect('/')->with('status', 'Please verify your email.');
    }
}

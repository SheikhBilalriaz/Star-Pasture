<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $userRole;

    /**
     * Where to redirect users after resetting their password.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $role = $this->userRole;

        // Redirect based on the user's role
        if ($role === 'admin') {
            return '/admin/login';
        } elseif ($role === 'subscriber') {
            return '/login';
        }

        // Default redirect if no specific role is found
        return '/';
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->userRole = $user->role;

        // Add a flash message for the next request
        session()->flash('status', 'Password updated successfully');
    }
}

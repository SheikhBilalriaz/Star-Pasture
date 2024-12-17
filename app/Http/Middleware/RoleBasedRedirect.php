<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleBasedRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect('/admin/dashboard'); // Admin dashboard route
            } elseif ($role === 'subscriber') {
                return redirect('/'); // Subscriber home route
            }
        }

        return $next($request);
    }
}

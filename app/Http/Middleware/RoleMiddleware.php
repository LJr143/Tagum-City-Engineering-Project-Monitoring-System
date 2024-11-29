<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param array $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Check if the authenticated user has any of the required roles
        foreach ($roles as $role) {
            if (Auth::user()->{"is" . ucfirst($role)}()) {
                return $next($request); // Allow access if role matches
            }
        }

        // If user doesn't have required role, redirect or show an error
        return redirect()->route('dashboard')->with('error', 'Access denied');
    }
}


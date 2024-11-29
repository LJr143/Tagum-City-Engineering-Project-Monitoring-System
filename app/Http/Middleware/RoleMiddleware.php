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

        $user = Auth::user();

        // Check if the user has any of the required roles
        foreach ($roles as $role) {
            if ($user->{"is" . ucfirst($role)}()) {
                return $next($request); // Allow access if the role matches
            }
        }

        // If user doesn't have the required role, redirect or show an error
        return redirect()->route('login')->with('error', 'Access denied.');
    }
}

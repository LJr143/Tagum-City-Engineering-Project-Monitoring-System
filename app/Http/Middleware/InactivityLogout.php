<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InactivityLogout
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::check() && (now()->diffInMinutes(session('last_activity_time')) > config('session.lifetime'))) {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('login');
        }

        session(['last_activity_time' => now()]);
        return $next($request);
    }
}

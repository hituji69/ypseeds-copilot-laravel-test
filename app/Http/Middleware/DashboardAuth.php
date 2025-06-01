<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated via Laravel's standard auth
        if (Auth::check()) {
            return $next($request);
        }

        // Check if user is authenticated as root via session
        if (session('dashboard_logged_in')) {
            return $next($request);
        }

        // Redirect to login if not authenticated
        return redirect('/dashboard/login');
    }
}
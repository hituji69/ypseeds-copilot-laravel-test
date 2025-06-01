<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DashboardAuthController extends Controller
{
    /**
     * Display the dashboard login view.
     */
    public function create()
    {
        return view('auth.dashboard-login');
    }

    /**
     * Handle an incoming dashboard authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Check for root user authentication
        if ($username === 'root' && $password === env('DASHBOARD_PASSWORD')) {
            $request->session()->regenerate();
            $request->session()->put('dashboard_logged_in', true);
            $request->session()->put('dashboard_user', 'root');
            
            return redirect()->intended('/dashboard');
        }

        // Try regular email/password authentication for backward compatibility
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $credentials = [
                'email' => $username,
                'password' => $password
            ];

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
        }

        throw ValidationException::withMessages([
            'username' => 'ログイン情報が正しくありません。',
        ]);
    }

    /**
     * Destroy the dashboard session.
     */
    public function destroy(Request $request)
    {
        // Log out Laravel auth if logged in
        if (Auth::check()) {
            Auth::guard('web')->logout();
        }

        // Clear dashboard session
        $request->session()->forget('dashboard_logged_in');
        $request->session()->forget('dashboard_user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard/login');
    }
}
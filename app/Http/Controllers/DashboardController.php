<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Show the properties management page.
     */
    public function properties()
    {
        return view('dashboard.properties');
    }

    /**
     * Show the inquiries management page.
     */
    public function inquiries()
    {
        return view('dashboard.inquiries');
    }

    /**
     * Show the users management page.
     */
    public function users()
    {
        return view('dashboard.users');
    }

    /**
     * Show the settings page.
     */
    public function settings()
    {
        return view('dashboard.settings');
    }
}
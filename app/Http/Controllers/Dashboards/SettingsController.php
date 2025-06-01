<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Show the settings page.
     */
    public function index()
    {
        return view('dashboard.settings');
    }
}
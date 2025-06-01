<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Show the properties management page.
     */
    public function index()
    {
        return view('dashboard.properties');
    }
}
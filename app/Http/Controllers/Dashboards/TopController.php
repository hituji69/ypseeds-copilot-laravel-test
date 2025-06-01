<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function index()
    {
        return view('dashboard.index');
    }
}
<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
    /**
     * Show the inquiries management page.
     */
    public function index()
    {
        return view('dashboard.inquiries');
    }
}
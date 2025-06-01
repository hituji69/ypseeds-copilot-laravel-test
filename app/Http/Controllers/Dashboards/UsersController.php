<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the users management page.
     */
    public function index()
    {
        return view('dashboard.users');
    }
}
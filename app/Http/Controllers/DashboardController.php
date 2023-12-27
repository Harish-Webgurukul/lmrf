<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // to display admin dashboard
        // dd(auth()->user());
        // dd(auth()->user()->firstname);
        // dd(auth()->user()->is_admin);

        return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }
}

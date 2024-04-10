<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //

    public function index()
    {


        // to display admin dashboard
        // dd(auth()->user());
        // dd(auth()->user()->firstname);
        // dd(auth()->user()->is_admin);

        // $facility = Facility::whereHas('patients')->withCount('patients')->get();
        $facility = Facility::withCount('patients')->get();
        // dd($facility);
        return view('dashboard', compact('facility'));
    }

    public function login()
    {
        return view('login');
    }
}

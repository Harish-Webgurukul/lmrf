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
        $patientcount = Patient::where('is_deleted', '=', 0)->count();
        $facilitycount = Facility::where('is_deleted', '=', 0)->count();
        // dd($patientcount);
        return view('dashboard', compact('patientcount', 'facilitycount'));
    }

    public function login()
    {
        return view('login');
    }
}

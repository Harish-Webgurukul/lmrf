<?php

namespace App\Http\Controllers;

use App\Models\Biweeklycall;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BiWeeklyController extends Controller
{
    //
    public function new_call()
    {
        $currentDate = Carbon::now()->startOfDay();
        // Patient::where('user_type', '2')->orderBy('created_at', 'DESC')->get();
        $res =  Biweeklycall::with('Patient')->where('call_status', '=', 0)->where('call_date', '<', $currentDate)->orWhere('call_date', '=', $currentDate)->get();

        return view('admin.biweekly.new_call', ['patients' => $res]);
    }

    public function call_patient()
    {
        $res = request()->post('study_id');
        $res =  Biweeklycall::with('Patient')->where('id', '=', $res)->first();
        return view('admin.biweekly.call_patient', ['patient' => $res]);
    }
}

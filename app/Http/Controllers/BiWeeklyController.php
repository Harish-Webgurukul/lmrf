<?php

namespace App\Http\Controllers;

use App\Models\Biweeklycall;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BiWeeklyController extends Controller
{
    //0-pending 1-failed  -2done
    public function new_call()
    {
        $currentDate = Carbon::now()->startOfDay();
        $res =  Biweeklycall::with('Patient')->where('call_status', '=', 0)->where('call_date', '=', $currentDate)->get();
        return view('admin.biweekly.new_call', ['patients' => $res]);
    }

    public function call_patient($id)
    {
        $res =  Biweeklycall::with('Patient')->where('id', '=', $id)->first();
        return view('admin.biweekly.call_patient', ['patient' => $res]);
    }

    public function call_patient_update($id)
    {

        $biweeklycall = Biweeklycall::where('id', $id)->firstOrFail();
        $biweeklycall['call_status'] = request()->get('call_status', $biweeklycall['call_status']);
        $biweeklycall['ils_symptons_active'] = request()->get('ils_symptons_active') == null ? 0 : 1;
        $biweeklycall['home_visit'] =  request()->get('home_visit') == null ? 0 : 1;
        // $biweeklycall->hospital_visit = request()->get('hospital_visit', null);
        $biweeklycall['notes'] = request()->get('notes', $biweeklycall['notes']);
        dd($biweeklycall);
        $biweeklycall->save();
        return redirect()->route('call_patient')->with('success', 'Operator Update Successfully1');
    }
    //0-pending 1-failed  -2done
    public function pending_call()
    {
        $pending_call = true;
        $currentDate = Carbon::now()->startOfDay();
        $res =  Biweeklycall::with('Patient')->where('call_status', '=', 0)->where('call_date', '<', $currentDate)->get();
        return view('admin.biweekly.new_call', ['patients' => $res, 'pending_call' => $pending_call]);
    }

    // same view for pending call and new call
    public function pending_call_patient($id)
    {
        $pending_call = true;
        $res =  Biweeklycall::with('Patient')->where('id', '=', $id)->first();
        return view('admin.biweekly.call_patient', ['patient' => $res, 'pending_call' => $pending_call]);
    }
}

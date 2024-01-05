<?php

namespace App\Http\Controllers;

use App\Models\Ancvisit;
use App\Models\Ilsfollowup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AncController extends Controller
{
    public function view2_all()
    {
        $currentDate = Carbon::now()->startOfDay();
        $res =  Ancvisit::with('patient')->where('visit_number', '=', 2)->where('status', '=', 0)->where('from_date', '<=', $currentDate)->get();
        return view('admin.anc.index', ['ancs' => $res, 'visit_no' => 2]);
    }
    public function view3_all()
    {
        $currentDate = Carbon::now()->startOfDay();

        $res =  Ancvisit::with('patient')->where('visit_number', '=', 3)->where('status', '=', 0)->where('from_date', '<=', $currentDate)->get();
        return view('admin.anc.index', ['ancs' => $res]);
    }
    public function view4_all()
    {
        $currentDate = Carbon::now()->startOfDay();

        $res =  Ancvisit::with('patient')->where('visit_number', '=', 4)->where('status', '=', 0)->where('from_date', '<=', $currentDate)->get();
        return view('admin.anc.index', ['ancs' => $res]);
    }
    public function view5_all()
    {
        $currentDate = Carbon::now()->startOfDay();

        $res =  Ancvisit::with('patient')->where('visit_number', '=', 5)->where('status', '=', 0)->where('from_date', '<=', $currentDate)->get();
        return view('admin.anc.index', ['ancs' => $res]);
    }
    public function view6_all()
    {
        $currentDate = Carbon::now()->startOfDay();
        $res =  Ancvisit::with('patient')->where('visit_number', '=', 6)->where('status', '=', 0)->where('from_date', '<=', $currentDate)->get();
        return view('admin.anc.index', ['ancs' => $res]);
    }


    public function show($id)
    {
        $res =  Ancvisit::with('patient')->where('id', '=', $id)->firstOrFail();
        return view('admin.anc.show', ['anc' => $res]);
    }


    public function update($id)
    {
        $biweeklycall = Ancvisit::where('id', $id)->firstOrFail();
        $biweeklycall['status'] = request()->get('call_status', $biweeklycall['call_status']);
        $biweeklycall['ils_symptons_active'] = request()->get('ils_symptons_active') == null ? 0 : 1;
        $biweeklycall['visit_completed_on'] =  request()->get('home_visit') == null ? 0 : 1;
        $biweeklycall['notes'] = request()->get('notes', $biweeklycall['notes']);
        $biweeklycall->save();
        if ($biweeklycall['ils_symptons_active'] == 1) {
            Ilsfollowup::create([
                'hospital_visit' => request()->get('hospital_visit'),
                'staff_id' => $biweeklycall['staff_id'],
                'study_id' => $biweeklycall['study_id'],
                'patient_id' => $biweeklycall['patient_id']
            ]);
        }

        if (request()->get('call_type')) {
            return redirect()->route('pending_call')->with('success', 'Data Update Successfully1');
        }
        return redirect()->route('new_call')->with('success', 'Data Update Successfully1');
    }
}

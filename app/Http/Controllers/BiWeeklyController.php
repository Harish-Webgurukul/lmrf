<?php

namespace App\Http\Controllers;

use App\Models\Biweeklycall;
use App\Models\Homevisit;
use App\Models\Hospitalvisit;
use App\Models\Ilsfollowup;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BiWeeklyController extends Controller
{
    //0-pending 1-failed  -2done
    public function new_call()
    {

        $currentDate = Carbon::now()->startOfDay();
        $res =  Biweeklycall::with('Patient')->where('status', '=', 0)->where('call_date', '=', $currentDate)->get();
        return view('admin.biweekly.new_call', ['patients' => $res]);
    }

    public function call_patient($id)
    {
        $res =  Biweeklycall::with('Patient')->where('id', '=', $id)->where('status', '=', 0)->firstOrFail();
        return view('admin.biweekly.call_patient', ['patient' => $res]);
    }

    public function call_patient_update($id)
    {


        $hospital_visit = request()->get('hospital_visit', '');
        $home_visit =  request()->get('home_visit', '');
        $ils_symptons_active = request()->get('ils_symptons_active') == null ? 0 : 1;
        $status = request()->get('status');
        if ($status == 0) {
            return redirect()->route('new_call')->with('success', 'No data updated!');
        }

        $biweeklycall = Biweeklycall::where('id', $id)->firstOrFail();
        if ($status == 1) {
            $biweeklycall['status'] = 1;
            $biweeklycall['attempt_failed'] = 1;
            $biweeklycall['notes'] = request()->get('notes', $biweeklycall['notes']);
            if ($home_visit != null) {
                Homevisit::create([
                    'staff_id' => $biweeklycall['staff_id'],
                    'study_id' => $biweeklycall['study_id'],
                    'patient_id' => $biweeklycall['patient_id'],
                    'reason' => 0,
                    'visit_date' => Carbon::now(),
                    'note' => request()->get('notes', $biweeklycall['notes'])
                ]);
            }
        } else {
            $biweeklycall['status'] = request()->get('status', $biweeklycall['status']);
            $biweeklycall['notes'] = request()->get('notes', $biweeklycall['notes']);
        }

        $biweeklycall->save();
        if ($ils_symptons_active == 1 && $status == 2) {
            Ilsfollowup::create([
                'staff_id' => $biweeklycall['staff_id'],
                'study_id' => $biweeklycall['study_id'],
                'patient_id' => $biweeklycall['patient_id'],
                'reported_from' => 'biweekly call',
                'reported_on' => Carbon::now()

            ]);
            if ($hospital_visit != null) {
                Hospitalvisit::create([
                    'staff_id' => $biweeklycall['staff_id'],
                    'study_id' => $biweeklycall['study_id'],
                    'patient_id' => $biweeklycall['patient_id'],
                    'visit_date' => request()->get('hospital_visit'),
                    'reason' => $ils_symptons_active,
                    'note' => request()->get('notes', $biweeklycall['notes'])
                ]);
            }
            if ($home_visit != null) {

                Homevisit::create([
                    'staff_id' => $biweeklycall['staff_id'],
                    'study_id' => $biweeklycall['study_id'],
                    'patient_id' => $biweeklycall['patient_id'],
                    'reason' => 1,
                    'visit_date' => Carbon::now(),
                    'note' => request()->get('notes', $biweeklycall['notes'])
                ]);
            }
        }

        if (request()->get('call_type')) {
            return redirect()->route('pending_call')->with('success', 'Data Update Successfully1');
        }
        return redirect()->route('new_call')->with('success', 'Data Update Successfully1');
    }
    //0-pending 1-failed  -2done
    public function pending_call()
    {
        $pending_call = true;
        $currentDate = Carbon::now()->startOfDay();
        $res =  Biweeklycall::with('Patient')->where('status', '=', 0)->where('call_date', '<', $currentDate)->get();
        return view('admin.biweekly.new_call', ['patients' => $res, 'pending_call' => $pending_call]);
    }

    // same view for pending call and new call
    public function pending_call_patient($id)
    {
        $pending_call = true;
        $res =  Biweeklycall::with('Patient')->where('id', '=', $id)->first();
        return view('admin.biweekly.call_patient', ['patient' => $res, 'pending_call' => $pending_call]);
    }

    public function ils_index()
    {

        $ilsfollowups = Ilsfollowup::with('patient')->where('is_ils_active', '=', 1)->get();
        return view('admin.ils.index', ['ilsfollowups' => $ilsfollowups]);
    }
    public function ils_call_patient($id)
    {

        $res =  Ilsfollowup::with('Patient')->where('id', '=', $id)->where('status', '=', 0)->firstOrFail();
        return view('admin.ils.call_patient', ['patient' => $res]);
    }
    public function ils_call_update($id)
    {
        $status = request()->get('status');

        $ils_resolve = request()->get('ils_resolve', '');
        // dd(request()->all());
        $ilsupdate = Ilsfollowup::where('id', $id)->firstOrFail();
        if ($status == 2) {
            $ilsupdate['status'] = $status;
            $ilsupdate['note'] = request()->get('notes', '');
            if ($ils_resolve == "true") {
                $ilsupdate['is_ils_active'] = 0;
            }
        }
        if ($status == 1) {
            $ilsupdate['status'] = $status;
            $ilsupdate['note'] = request()->get('notes', '');
        }

        $ilsupdate->save();

        return redirect()->route('ils.index')->with('success', 'Data Update Successfully1');
    }
    // Hospital visit

    public function hospital_index()
    {
        $ilsfollowups = Hospitalvisit::with('patient')->where('status', '=', 0)->get();
        return view('admin.hospital.index', ['ilsfollowups' => $ilsfollowups]);
    }

    public function hospital_call_patient($id)
    {

        $res =  Hospitalvisit::with('Patient')->where('id', '=', $id)->where('status', '=', 0)->firstOrFail();
        return view('admin.hospital.call_patient', ['patient' => $res]);
    }

    public function hospital_call_update($id)
    {

        // dd(request()->all());
        $hospital = Hospitalvisit::where('id', $id)->firstOrFail();
        $hospital['status'] = request()->get('status');
        $hospital['note'] = request()->get('notes');
        $hospital['visit_completed_on'] = Carbon::now();
        $hospital->save();

        return redirect()->route('hospital.index')->with('success', 'Data Update Successfully1');
    }

    // HomeVisit

    public function home_index_ils()
    {
        $ilsfollowups = Homevisit::with('patient')->where('status', '=', 0)->where('reason', '=', 1)->get();
        return view('admin.home.index_ils', ['ilsfollowups' => $ilsfollowups]);
    }

    public function home_index_nocontact()
    {
        $ilsfollowups = Homevisit::with('patient')->where('status', '=', 0)->where('reason', '=', 2)->get();
        return view('admin.home.index_nocontact', ['ilsfollowups' => $ilsfollowups]);
    }
}

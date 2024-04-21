<?php

namespace App\Http\Controllers;

use App\Models\Ancvisit;
use App\Models\Homevisit;
use App\Models\Hospitalvisit;
use App\Models\Ilsfollowup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AncController extends Controller
{
    public function view2_all()
    {
        $currentDate = Carbon::now()->startOfDay();

        $query = Ancvisit::query();
        $query = $query->with('patient')->where('visit_number', '=', 2)->where('status', '=', 0)->where('from_date', '<=', $currentDate);
        if (Gate::allows('staff')) {
            $query = $query->where('staff_id', '=', Auth()->user()->staff_id);
        }
        $res = $query->get();


        return view('admin.anc.index', ['ancs' => $res, 'visit_no' => 2]);
    }
    public function view3_all()
    {
        $currentDate = Carbon::now()->startOfDay();

        $query = Ancvisit::query();
        $query = $query->with('patient')->where('visit_number', '=', 3)->where('status', '=', 0)->where('from_date', '<=', $currentDate);
        if (Gate::allows('staff')) {
            $query = $query->where('staff_id', '=', Auth()->user()->staff_id);
        }
        $res = $query->get();

        return view('admin.anc.index', ['ancs' => $res, 'visit_no' => 3]);
    }
    public function view4_all()
    {
        $currentDate = Carbon::now()->startOfDay();
        $query = Ancvisit::query();
        $query = $query->with('patient')->where('visit_number', '=', 4)->where('status', '=', 0)->where('from_date', '<=', $currentDate);
        if (Gate::allows('staff')) {
            $query = $query->where('staff_id', '=', Auth()->user()->staff_id);
        }
        $res = $query->get();

        return view('admin.anc.index', ['ancs' => $res, 'visit_no' => 4]);
    }
    public function view5_all()
    {
        $currentDate = Carbon::now()->startOfDay();
        $query = Ancvisit::query();
        $query = $query->with('patient')->where('visit_number', '=', 5)->where('status', '=', 0)->where('from_date', '<=', $currentDate);
        if (Gate::allows('staff')) {
            $query = $query->where('staff_id', '=', Auth()->user()->staff_id);
        }
        $res = $query->get();

        return view('admin.anc.index', ['ancs' => $res, 'visit_no' => 5]);
    }
    public function view6_all()
    {
        $currentDate = Carbon::now()->startOfDay();
        $res =  Ancvisit::with('patient')->where('visit_number', '=', 6)->where('status', '=', 0)->where('from_date', '<=', $currentDate)->get();
        return view('admin.anc.index', ['ancs' => $res, 'visit_no' => 6]);
    }


    public function show($id)
    {
        $res =  Ancvisit::with('patient')->where('id', '=', $id)->firstOrFail();
        return view('admin.anc.show', ['anc' => $res]);
    }


    public function update($id)
    {


        $hospital_visit = request()->get('hospital_visit', '');
        $home_visit =  request()->get('home_visit', '');
        $ils_symptons_active = request()->get('ils_symptons_active') == null ? 0 : 1;
        $status = request()->get('status');
        if ($status == 0) {
            return redirect()->route('new_call')->with('success', 'No data updated!');
        }

        $anccall = Ancvisit::where('id', $id)->firstOrFail();
        if ($status == 1) {
            $anccall['status'] = 1;
            $anccall['note'] = request()->get('notes', $anccall['notes']);
            if ($home_visit != null) {
                Homevisit::create([
                    'staff_id' => $anccall['staff_id'],
                    'study_id' => $anccall['study_id'],
                    'patient_id' => $anccall['patient_id'],
                    'reason' => 0,
                    'visit_date' => Carbon::now(),
                    'note' => request()->get('notes', $anccall['notes'])
                ]);
            }
        } else {
            $anccall['visit_completed_on'] = Carbon::now();
            $anccall['status'] = request()->get('status', $anccall['status']);
            $anccall['note'] = request()->get('notes', $anccall['notes']);
        }

        $anccall->save();
        if ($ils_symptons_active == 1 && $status == 2) {
            Ilsfollowup::create([
                'staff_id' => $anccall['staff_id'],
                'study_id' => $anccall['study_id'],
                'patient_id' => $anccall['patient_id'],
                'reported_from' => 'anc call',
                'reported_on' => Carbon::now()

            ]);
            if ($hospital_visit != null) {
                Hospitalvisit::create([
                    'staff_id' => $anccall['staff_id'],
                    'study_id' => $anccall['study_id'],
                    'patient_id' => $anccall['patient_id'],
                    'visit_date' => request()->get('hospital_visit'),
                    'reason' => $ils_symptons_active,
                    'note' => request()->get('notes', $anccall['note'])
                ]);
            }
            if ($home_visit != null) {

                Homevisit::create([
                    'staff_id' => $anccall['staff_id'],
                    'study_id' => $anccall['study_id'],
                    'patient_id' => $anccall['patient_id'],
                    'reason' => 1,
                    'visit_date' => Carbon::now(),
                    'note' => request()->get('notes', $anccall['note'])
                ]);
            }
        }

        return redirect()->route('anc2.view_all')->with('success', 'Data Update Successfully1');
    }
}

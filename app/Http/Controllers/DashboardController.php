<?php

namespace App\Http\Controllers;

use App\Models\Biweeklycall;
use App\Models\Facility;
use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class DashboardController extends Controller
{
    //

    public function index()
    {

        // to display admin dashboard
        // dd(auth()->user());
        // dd(auth()->user()->firstname);
        // dd(auth()->user()->is_admin);
        $currentDate = Carbon::now()->startOfDay();
        // $facility = Facility::whereHas('patients')->withCount('patients')->get();
        $facility = Facility::withCount('patients')->get();

        // Generate dashboard points from facility



        if (Gate::allows('admin')) {
            $new_call =  DB::table('biweeklycalls')
                ->where('status', '=', 0)
                ->where('call_date', '=', $currentDate)
                ->join('patients', function (JoinClause $join) {
                    $join->on('biweeklycalls.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {

            $new_call =  DB::table('biweeklycalls')
                ->where('status', '=', 0)
                ->where('call_date', '=', $currentDate)
                ->join('patients', function (JoinClause $join) {
                    $join->on('biweeklycalls.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }

        // Pending calls count
        if (Gate::allows('admin')) {
            $pending_call =  DB::table('biweeklycalls')
                ->where('status', '=', 0)
                ->where('call_date', '<', $currentDate)
                ->join('patients', function (JoinClause $join) {
                    $join->on('biweeklycalls.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {

            $pending_call =  DB::table('biweeklycalls')
                ->where('status', '=', 0)
                ->where('call_date', '<', $currentDate)
                ->join('patients', function (JoinClause $join) {
                    $join->on('biweeklycalls.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }
        // ILS followup calls
        if (Gate::allows('admin')) {
            $ils_followup =  DB::table('ilsfollowups')
                ->where('status', '=', 0)
                ->where('is_ils_active', '=', 1)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ilsfollowups.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {

            $ils_followup =  DB::table('ilsfollowups')
                ->where('status', '=', 0)
                ->where('is_ils_active', '=', 1)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ilsfollowups.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }

        // ANC visits2
        if (Gate::allows('admin')) {
            $anc_visit2 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 2)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {
            $anc_visit2 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 2)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }

        // $anc_visit2details = array();

        // foreach ($facility as $key => $value) {
        //     // dd($value['id']);
        //     // dd($value['facility_name']);
        //     foreach ($anc_visit2 as $k => $v) {
        //         dd($v->facility_id);
        //     }
        // }

        // ANC visits3
        if (Gate::allows('admin')) {
            $anc_visit3 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 3)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {
            $anc_visit3 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 3)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }
        // ANC visits4
        if (Gate::allows('admin')) {
            $anc_visit4 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 4)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {
            $anc_visit4 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 4)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }

        // ANC visits5
        if (Gate::allows('admin')) {
            $anc_visit5 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 5)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {
            $anc_visit5 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 5)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }
        // ANC visits6
        if (Gate::allows('admin')) {
            $anc_visit6 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 6)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null);
                })
                ->get()->count();
        } else {
            $anc_visit6 =  DB::table('ancvisits')
                ->where('status', '=', 0)
                ->where('visit_number', '=', 6)
                ->join('patients', function (JoinClause $join) {
                    $join->on('ancvisits.study_id', '=', 'patients.study_id')
                        ->where('patients.delivery_date', '=', null)
                        ->where('patients.staff_id', '=', Auth()->user()->staff_id);
                })
                ->get()->count();
        }




        return view('dashboard', compact('facility', 'new_call', 'pending_call', 'ils_followup', 'anc_visit2', 'anc_visit3', 'anc_visit4', 'anc_visit5', 'anc_visit6'));
    }

    public function login()
    {
        return view('login');
    }
}

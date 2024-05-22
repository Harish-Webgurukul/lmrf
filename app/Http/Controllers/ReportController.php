<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Biweeklycall;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    //generate report view
    public function index()
    {

        $operators = User::where('user_role', '2')->get();
        // dd($operators);
        return view('admin.reports.index', compact('operators'));
    }

    public function staff_report()
    {

        $validated = request()->validate(
            [
                'reporttype' => 'required',
                'fromDate' => 'required',
                'toDate' => 'required',
            ]
        );
        $currentDate = Carbon::now()->startOfDay();
        $op = $validated['reporttype'];
        $fromDate = $validated['fromDate'];
        $toDate = $validated['toDate'];
        // dd(request()->all());
        switch ($op) {
            case 1:
                break;
            case 2:
                $arr = [
                    "staff id",
                    "study id",
                    "firstname",
                    "lastname",
                    "contact1",
                    "contact2",
                    "proxy contact1",
                    "proxy contact2",
                    "facility",
                    "address",
                    "landmark",
                    "city",
                    "pincode",
                    "enrollment date",
                    "expected delivery date",
                    "delivery date",
                    "biweekly call date",
                ];

                $query = DB::table('biweeklycalls')
                    ->leftJoin('patients', 'biweeklycalls.study_id', '=', 'patients.study_id')
                    ->select('patients.staff_id', 'patients.study_id', 'patients.firstname', 'patients.lastname', 'patients.contact1', 'patients.contact2', 'patients.proxy_contact1', 'patients.proxy_contact2', 'patients.facility', 'patients.address', 'patients.landmark', 'patients.city', 'patients.pincode', 'patients.enrollment_date', 'patients.expected_delivery_date', 'patients.delivery_date', 'biweeklycalls.call_date')
                    ->where('biweeklycalls.status', '=', 0)->where('biweeklycalls.call_date', '>', $fromDate)->where('biweeklycalls.call_date', '<', $toDate);

                return Excel::download(new UsersExport($query, $arr), 'ExpectedNewCalls.xlsx');
                break;
            case 3:
                $arr = [
                    "staff id",
                    "study id",
                    "firstname",
                    "lastname",
                    "contact1",
                    "contact2",
                    "proxy contact1",
                    "proxy contact2",
                    "facility",
                    "address",
                    "landmark",
                    "city",
                    "pincode",
                    "enrollment date",
                    "expected delivery date",
                    "delivery date",
                    "biweekly call date",
                ];
                $query = DB::table('biweeklycalls')
                    ->leftJoin('patients', 'biweeklycalls.study_id', '=', 'patients.study_id')
                    ->select('patients.staff_id', 'patients.study_id', 'patients.firstname', 'patients.lastname', 'patients.contact1', 'patients.contact2', 'patients.proxy_contact1', 'patients.proxy_contact2', 'patients.facility', 'patients.address', 'patients.landmark', 'patients.city', 'patients.pincode', 'patients.enrollment_date', 'patients.expected_delivery_date', 'patients.delivery_date', 'biweeklycalls.call_date')
                    ->where('biweeklycalls.status', '=', 0)->where('biweeklycalls.call_date', '<', $currentDate);

                return Excel::download(new UsersExport($query, $arr), 'PendingCalls.xlsx');
                break;
            default:
        }


        return  view('admin.reports.index');
    }

    public function exportdata($arg)
    {
        // $user = User::all();
        return Excel::download(new UsersExport($arg), 'user.xlsx');
    }
}

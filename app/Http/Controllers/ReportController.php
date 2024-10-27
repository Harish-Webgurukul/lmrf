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
                'fromDate' => 'nullable|date',
                'toDate' => 'nullable|date',
            ]
        );
        $currentDate = Carbon::now()->startOfDay();
        $op = $validated['reporttype'];
        // Set dates to null if they are not provided
        $fromDate = $validated['fromDate'] ?? null;
        $toDate = $validated['toDate'] ?? null;
    
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
                case 4:
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
                        "Hospital visit date For ILS",
                        "Hospital visit completed on",
                        "Status"
                    ];
                    $query = DB::table('hospitalvisits')
                        ->leftJoin('patients', 'hospitalvisits.study_id', '=', 'patients.study_id')
                        ->select('patients.staff_id', 'patients.study_id', 'patients.firstname', 'patients.lastname', 'patients.contact1', 'patients.contact2', 'patients.proxy_contact1', 'patients.proxy_contact2', 'patients.facility', 'patients.address', 'patients.landmark', 'patients.city', 'patients.pincode', 'patients.enrollment_date', 'patients.expected_delivery_date', 'patients.delivery_date', 'hospitalvisits.visit_date', 'hospitalvisits.visit_completed_on')
                        ->where('hospitalvisits.reason', '=', 1)->where('hospitalvisits.visit_date', '<', $fromDate)->where('hospitalvisits.visit_date', '<', $toDate);;
    
                    return Excel::download(new UsersExport($query, $arr), 'HospitalVisitForILS.xlsx');
                    break;
                    case 5:
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
                            "Hospital visit date For ILS",
                            "Hospital visit completed on",
                            "Status"
                        ];
                        $query = DB::table('hospitalvisits')
                            ->leftJoin('patients', 'hospitalvisits.study_id', '=', 'patients.study_id')
                            ->select('patients.staff_id', 'patients.study_id', 'patients.firstname', 'patients.lastname', 'patients.contact1', 'patients.contact2', 'patients.proxy_contact1', 'patients.proxy_contact2', 'patients.facility', 'patients.address', 'patients.landmark', 'patients.city', 'patients.pincode', 'patients.enrollment_date', 'patients.expected_delivery_date', 'patients.delivery_date', 'hospitalvisits.visit_date', 'hospitalvisits.visit_completed_on')
                            ->where('hospitalvisits.reason', '=', 1);
        
                        return Excel::download(new UsersExport($query, $arr), 'TotalILSReported.xlsx');
                    
                        break;
                case 8:
                    $arr = [
                    'staff_id',
                    'study_id',
                    'facility Name',
                    'firstname',
                    'lastname',
                    'contact1',
                    'contact2',
                    'proxy_contact1',
                    'proxy_contact2',
                    'address',
                    'landmark',
                    'city',
                    'pincode',
                    'enrollment_date',
                    'expected_delivery_date',
                    'delivery_date',
                    'is_deleted'
                    ];
                    $query = DB::table('patients')
                    ->leftJoin('facilities', 'patients.facility_id', '=', 'facilities.id')
                        ->select('patients.staff_id',
                         'patients.study_id',
                         'facilities.facility_name',
                        'patients.firstname',
                         'patients.lastname',
                         'patients.contact1',
                         'patients.contact2',
                         'patients.proxy_contact1',
                         'patients.proxy_contact2',
                        'patients.address',
                         'patients.landmark',
                         'patients.city',
                         'patients.pincode',
                         'patients.enrollment_date', 
                         'patients.expected_delivery_date', 
                         'patients.delivery_date', 
                         'patients.is_deleted')
;                        
                    return Excel::download(new UsersExport($query, $arr), 'PatientDetails.xlsx');
                    break;
                    case 9:
                        $arr = [                        
                    'firstname',
                    'lastname',
                    'email',
                    'contact1',
                    'contact2',
                    'staff_id',
                    'is_deleted',
                    'last_loggedin',
                        ];
                        $query = DB::table('users')->where('users.user_role', '=', 2)
                            ->select(
                               'users.firstname',
                                'users.lastname',
                                'users.email',
                                'users.contact1',
                                'users.contact2',
                                'users.staff_id',
                                'users.is_deleted',
                                'users.last_loggedin'
                           );                        
                        return Excel::download(new UsersExport($query, $arr), 'StaffDetails.xlsx');
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

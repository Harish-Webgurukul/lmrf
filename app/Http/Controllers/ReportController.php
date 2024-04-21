<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        return  view('admin.reports.index');
    }

    public function exportdata()
    {
        $user = User::all();
        return Excel::download(new UsersExport($user), 'user.xlsx');
    }
}

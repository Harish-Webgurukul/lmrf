<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Operator;

class OperatorController extends Controller
{
    //

    public function index()
    {
        return view('admin.operator.index');
    }
    public function viewall()
    {
        $operators = User::where('user_type', '2')->orderBy('created_at', 'DESC')->get();
        // dd($operators);
        return view('admin.operator.viewall', ['operators' => $operators]);
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'staff_id' => 'required',
                'firstname' => 'required|min:3|max:40',
                'lastname' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'contact1' => 'required||min:8',
                'contact2' => 'nullable|min:8|max:13'
            ]
        );

        $user = User::create(
            [
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'email' => $validated['email'],
                'contact1' => $validated['contact1'],
                'contact2' => request()->get('contact2', ''),
                'staff_id' => $validated['staff_id'],
                'user_type' => 2,
                'password' => Hash::make($validated['password']),
            ]
        );

        return redirect()->route('viewall_operator');
    }


    // public function edit()
    // {
    // }
    // public function update()
    // {
    // }
    // public function destroy()
    // {
    // }
}

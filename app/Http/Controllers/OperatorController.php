<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    //

    public function index()
    {
        return view('admin.operator.index');
    }
    public function viewall()
    {
        $operators = User::where('user_role', '2')->orderBy('created_at', 'DESC')->get();
        // dd($operators);
        return view('admin.operator.viewall', ['operators' => $operators]);
    }

    public function view(User $user)
    {
        //if no data is found first or fail is used
        // Route model binding is used in argument.
        // used compact instead of associative array
        return view('admin.operator.view', compact('user'));
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
                'contact1' => 'required|min:8',
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
                'user_role' => 2,
                'password' => Hash::make($validated['password']),
            ]
        );

        return redirect()->route('viewall_operator')->with('success', 'Operator Added successfully!');
    }


    public function edit(User $user)
    {
        $editing = true;
        return view('admin.operator.view', compact('user', 'editing'));
    }

    public function update(User $user)
    {
        $validated = request()->validate(
            [
                'staff_id' => 'required',
                'firstname' => 'required|min:3|max:40',
                'lastname' => 'required|min:3|max:40',
                'email' => 'required|email',
                'password' => 'nullable|min:8',
                'contact1' => 'required|min:8',
                'contact2' => 'nullable|min:8|max:13'
            ]
        );

        $user->staff_id = request()->get('staff_id', '');
        $user->firstname = request()->get('firstname');
        $user->lastname = request()->get('lastname');
        $user->email = request()->get('email');
        if (isset($user->password)) {
            $user->password = Hash::make($validated['password']);
        }
        $user->contact1 = request()->get('contact1');
        $user->contact2 = request()->get('contact2');
        $user->save();

        return redirect()->route('view_operator', $user->id)->with('success', 'Operator Update Successfully1');
    }

    public function destroy(User $user)
    {
        //if no data is found first or fail is used
        // Route model binding is used in argument.
        $user->delete();
        return redirect()->route('viewall_operator')->with('success', 'Operator deleted successfully!');
    }
}

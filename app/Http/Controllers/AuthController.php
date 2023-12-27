<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {

        // dd(request()->all());
        $validated = request()->validate(
            [
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
                'staff_id' => 0,
                'password' => Hash::make($validated['password']),
            ]
        );

        return redirect()->route('login');
    }


    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );


        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'email' => "No matching user found with the provided email and password"
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'logged out successfully');
    }
}

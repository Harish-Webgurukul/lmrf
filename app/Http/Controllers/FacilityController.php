<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'facility_name' => 'required',
                'address' => 'nullable|min:3|max:40',
                'landmark' => 'nullable',
                'city' => 'nullable|min:4',
                'pincode' => 'nullable|min:6',

            ]
        );
        Facility::create(
            [
                'facility_name' => $validated['facility_name'],
                'address' => $validated['address'],
                'landmark' => $validated['landmark'],
                'city' => $validated['city'],
                'pincode' => $validated['pincode'],
            ]
        );

        return redirect()->route('facility.create')->with('success', 'Operator Added successfully!');
    }
}

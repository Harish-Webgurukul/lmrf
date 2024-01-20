<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{

    public function index(Facility $facility)
    {
        return view('admin.facilities.index', compact('facility'));
    }

    public function view()
    {
        $facilities = Facility::get();
        return view('admin.facilities.view', compact('facilities'));
    }
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

        return redirect()->route('facility.view')->with('success', 'Facility Added successfully!');
    }

    public function edit(Facility $facility)
    {
        $editing = true;
        return view('admin.facilities.index', compact('facility', 'editing'));
    }

    public function update(Facility $facility)
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

        $facility->facility_name = $validated['facility_name'];
        $facility->address = $validated['address'];
        $facility->landmark = $validated['landmark'];
        $facility->city = $validated['city'];
        $facility->pincode = $validated['pincode'];

        $facility->save();

        return redirect()->route('facility.view')->with('success', 'Facility Added successfully!');
    }

    public function destroy(Facility $facility)
    {
        //if no data is found first or fail is used
        // Route model binding is used in argument.
        $facility->delete();
        return redirect()->route('facility.view')->with('success', 'Facility deleted successfully!');
    }
}

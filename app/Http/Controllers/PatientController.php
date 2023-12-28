<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //

    public function create()
    {

        $facilities = Facility::get();
        return view('admin.patient.create', compact('facilities'));
    }

    public function index()
    {
        $patients = Patient::where('is_deleted', '=', 0)->orderBy('created_at', 'DESC')->get();
        return view('admin.patient.index', ['patients' => $patients]);
    }


    public function show($id)
    {
        $patient = Patient::where('is_deleted', '=', 0)->firstWhere('id', $id);
        return view('admin.patient.show', ['patient' => $patient]);
    }


    public function store()
    {
        // dd(request()->all());
        $validated = request()->validate(
            [
                'staff_id' => 'required',
                'study_id' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'contact1' => 'required',
                'contact2' => 'nullable|min:8|max:13',
                'proxy_contact1' => 'nullable|min:8|max:13',
                'proxy_contact2' => 'nullable|min:8|max:13',
                'facility' => 'required',
                'address' => 'required',
                'landmark' => 'required',
                'city' => 'required',
                'pincode' => 'required',
                'enrollment_date' => 'required',
                'expected_delivery_date' => 'required',
                'in_person_from_visit2' => 'required',
                'in_person_to_visit2' => 'required',
                'in_person_from_visit3' => 'required',
                'in_person_to_visit3' => 'required',
                'in_person_from_visit4' => 'required',
                'in_person_to_visit4' => 'required',
                'in_person_from_visit5' => 'required',
                'in_person_to_visit5' => 'required',
                'in_person_from_visit_final' => 'required',
                'in_person_to_visit_final' => 'required',


            ]
        );

        $user = Patient::create(
            [

                'staff_id' =>  $validated['staff_id'],
                'study_id' =>  $validated['study_id'],
                'firstname' =>  $validated['firstname'],
                'lastname' =>  $validated['lastname'],
                'email' =>  $validated['email'],
                'contact1' =>  $validated['contact1'],
                'contact2' =>  $validated['contact2'],
                'proxy_contact1' =>  $validated['proxy_contact1'],
                'proxy_contact2' =>  $validated['proxy_contact2'],
                'facility' =>  $validated['facility'],
                'address' =>  $validated['address'],
                'landmark' =>  $validated['landmark'],
                'city' =>  $validated['city'],
                'pincode' =>  $validated['pincode'],
                'enrollment_date' =>  $validated['enrollment_date'],
                'expected_delivery_date' =>  $validated['expected_delivery_date'],
                'in_person_from_visit2' =>  $validated['in_person_from_visit2'],
                'in_person_to_visit2' =>  $validated['in_person_to_visit2'],
                'in_person_from_visit3' =>  $validated['in_person_from_visit3'],
                'in_person_to_visit3' =>  $validated['in_person_to_visit3'],
                'in_person_from_visit4' =>  $validated['in_person_from_visit4'],
                'in_person_to_visit4' =>  $validated['in_person_to_visit4'],
                'in_person_from_visit5' =>  $validated['in_person_from_visit5'],
                'in_person_to_visit5' =>  $validated['in_person_to_visit5'],
                'in_person_from_visit_final' =>  $validated['in_person_from_visit_final'],
                'in_person_to_visit_final' =>  $validated['in_person_to_visit_final'],

            ]
        );

        return redirect()->route('patient.index')->with('success', 'Patient Added successfully!');
    }

    public function destroy($id)
    {
        //if no data is found first or fail is used
        // Route model binding is used in argument.
        $patient = Patient::where('id', $id)->firstOrFail();
        $patient->delete();
        return redirect()->route('patient.index')->with('success', 'Patient deleted successfully!');
    }
}

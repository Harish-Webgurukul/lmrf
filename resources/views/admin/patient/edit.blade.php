@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

       @include('shared.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
              @include('shared.navbar');
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('shared.success-message')
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Patient</h1>

                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-10 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Patient</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="{{route('patient.update', $patient->id)}}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                @if (count($facilities)==0)
                                                <p class="text-danger">---No Facility Found----Add Facility First----</p>
                                                @else
                                                <label> Select Facility</label>
                                                <select class="form-control" name="facility">
                                                @foreach ($facilities as $facilitie)
                                                @if($facilitie->id==$patient->facility_id){
                                                    <option selected="selected"    value="{{$facilitie->id}}">{{$facilitie->facility_name}} <small>({{$facilitie->address}})</small></option>
                                                }
                                                @else{
                                                    <option value="{{$facilitie->id}}">{{$facilitie->facility_name}} <small>({{$facilitie->address}})</small></option>
                                                }
                                                @endif

                                                @endforeach
                                                @endif

                                            </select>

                                                @error('facility')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 ">
                                                @if (count($facilities)==0)
                                                <p class="text-danger">---No Staff Found----Add Staff First----</p>
                                                @else
                                                <label> Select Staff</label>
                                                <select class="form-control" name="staff_id">
                                                @foreach ($operators as $operator)

                                                @if($operator->staff_id==$patient->staff_id){
                                                    <option selected="selected"  value="{{$operator->staff_id}}">{{$operator->firstname}} {{$operator->lastname}} <small>({{$operator->staff_id}})</small></option>
                                                }
                                                @else{
                                                    <option value="{{$operator->staff_id}}">{{$operator->firstname}} {{$operator->lastname}} <small>({{$operator->staff_id}})</small></option>
                                                }
                                                @endif
                                                @endforeach
                                                </select>
                                                @endif
                                                 @error('staff_id')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputStudyId"
                                                    placeholder="Study Id" name="study_id" value="{{$patient->study_id}}">
                                                    @error('study_id')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                    placeholder="First Name" name="firstname" value="{{$patient->firstname}}">
                                                    @error('firstname')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                    placeholder="Last Name" name="lastname" value="{{$patient->lastname}}">
                                                    @error('lastname')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Email Address" name="email" value="{{$patient->email}}">
                                                @error('email')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputContact1"
                                                placeholder="Contact1" name="contact1"  value="{{$patient->contact1}}">
                                                @error('contact1')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleRepeatContact2" placeholder="Contact2" name="contact2" value="{{$patient->contact2}}">
                                                    @error('contact2')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputProxyContact1"
                                                placeholder="Proxy Contact1" name="proxy_contact1" value="{{$patient->proxy_contact1}}">
                                                @error('proxy_contact1')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleRepeatProxyContact2" placeholder="Proxy Contact2" name="proxy_contact2" value="{{$patient->proxy_contact2}}">
                                                    @error('proxy_contact2')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputAddress"
                                                placeholder="Address" name="address" value="{{$patient->address}}">
                                                @error('address')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleLandmark" placeholder="Landmark" name="landmark" value="{{$patient->landmark}}">
                                                    @error('landmark')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputCity"
                                                placeholder="City" name="city" value="{{$patient->city}}">
                                                @error('city')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="examplePincode" placeholder="Pincode" name="pincode" value="{{$patient->pincode}}">
                                                    @error('pincode')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="enrollmentDate">Enrollment Date (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user" id="enrollmentDate"
                                                placeholder="Enrollment Date" name="enrollment_date" value="{{date_format(date_create($patient->enrollment_date),"Y-m-d")}}">
                                                @error('enrollment_date')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="ExpectedDeliveryDate">Expected Delivery Date (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="ExpectedDeliveryDate" placeholder="Expected Delivery Date" name="expected_delivery_date" value="{{date_format(date_create($patient->expected_delivery_date),"Y-m-d")}}">
                                                    @error('expected_delivery_date')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit2">InPerson Visit2 from (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisit2"
                                                placeholder="InPerson Visit2 from" name="in_person_from_visit2" value="{{$patient->ancvisits[0]->from_date==" " ? " ":date_format(date_create($patient->ancvisits[0]->from_date),"Y-m-d")}}">
                                                @error('in_person_from_visit2')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="in_person_to_visit2">InPerson Visit2 to (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit2" placeholder="InPerson Visit2 to" name="in_person_to_visit2" value="{{$patient->ancvisits[0]->to_date==" " ? " ":date_format(date_create($patient->ancvisits[0]->to_date),"Y-m-d")}}">
                                                    @error('in_person_to_visit2')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit3">InPerson Visit3 from (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisit3"
                                                placeholder="InPerson Visit3 from" name="in_person_from_visit3" value="{{$patient->ancvisits[1]->from_date==" " ? " ":date_format(date_create($patient->ancvisits[1]->from_date),"Y-m-d")}}">
                                                @error('in_person_from_visit3')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inpersontovisit2">InPerson Visit3 to (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit2" placeholder="InPerson Visit3 to" name="in_person_to_visit3" value="{{$patient->ancvisits[1]->to_date==" " ? " ":date_format(date_create($patient->ancvisits[1]->to_date),"Y-m-d")}}">
                                                    @error('in_person_to_visit3')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit4">InPerson Visit4 from (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisit4"
                                                placeholder="InPerson Visit4 from" name="in_person_from_visit4" value="{{$patient->ancvisits[2]->from_date==" " ? " ":date_format(date_create($patient->ancvisits[2]->from_date),"Y-m-d")}}">
                                                @error('in_person_from_visit4')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="in_person_to_visit4">InPerson Visit4 to (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit4" placeholder="InPerson Visit2 to" name="in_person_to_visit4"  value="{{$patient->ancvisits[2]->to_date==" " ? " ":date_format(date_create($patient->ancvisits[2]->to_date),"Y-m-d")}}">
                                                    @error('in_person_to_visit4')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit5">InPerson Visit5 from (dd/mm/yyyy)</label>
                                                <input type="text" class="form-control form-control-user" id="inpersonfromvisit5"
                                                placeholder="InPerson Visit5 from" name="in_person_from_visit5" value="{{$patient->ancvisits[3]->from_date==" " ? " ":date_format(date_create($patient->ancvisits[3]->from_date),"Y-m-d")}}">
                                                @error('in_person_from_visit5')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="in_person_to_visit5">InPerson Visit5 to (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit5" placeholder="InPerson Visit5 to" name="in_person_to_visit5"  value="{{$patient->ancvisits[3]->to_date==" " ? " ":date_format(date_create($patient->ancvisits[3]->to_date),"Y-m-d")}}">
                                                    @error('in_person_to_visit5')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisitfinal">InPerson Visit Final from (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisitfinal"
                                                placeholder="InPerson Final from" name="in_person_from_visit_final" value="{{$patient->ancvisits[4]->from_date==" " ? " ":date_format(date_create($patient->ancvisits[4]->from_date),"Y-m-d")}}">
                                                @error('in_person_from_visit_final')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inpersontoFinal">InPerson Visit Final to (dd/mm/yyyy)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontoFinal" placeholder="InPerson Final to" name="in_person_to_visit_final" value="{{$patient->ancvisits[4]->to_date==" " ? " ":date_format(date_create($patient->ancvisits[4]->to_date),"Y-m-d")}}">
                                                    @error('in_person_to_visit_final')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                           Update
                                        </button>
                                        <hr>

                                    </form>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

@endsection

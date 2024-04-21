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
                        <h1 class="h3 mb-0 text-gray-800">Add Patient</h1>

                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-10 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Patient</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="{{route('patient.store')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                @if (count($facilities)==0)
                                                <p class="text-danger">---No Facility Found----Add Facility First----</p>
                                                @else
                                                <label> Select Facility</label>
                                                <select class="form-control" name="facility">
                                                @foreach ($facilities as $facilitie)
                                                    <option value="{{$facilitie->id}}">{{$facilitie->facility_name}} <small>({{$facilitie->address}})</small></option>
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
                                                @if (count($operators)==0)
                                                <p class="text-danger">---No Staff Found----Add Staff First----</p>
                                                @else
                                                <label> Select Staff</label>
                                                <select class="form-control" name="staff_id">
                                                @foreach ($operators as $operator)
                                                    <option value="{{$operator->staff_id}}">{{$operator->firstname}} {{$operator->lastname}} <small>({{$operator->staff_id}})</small></option>
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
                                                    placeholder="Study Id" name="study_id">
                                                    @error('study_id')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                    placeholder="First Name" name="firstname">
                                                    @error('firstname')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                    placeholder="Last Name" name="lastname">
                                                    @error('lastname')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputContact1"
                                                placeholder="Contact1" name="contact1">
                                                @error('contact1')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleRepeatContact2" placeholder="Contact2" name="contact2">
                                                    @error('contact2')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputProxyContact1"
                                                placeholder="Proxy Contact1" name="proxy_contact1">
                                                @error('proxy_contact1')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleRepeatProxyContact2" placeholder="Proxy Contact2" name="proxy_contact2">
                                                    @error('proxy_contact2')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputAddress"
                                                placeholder="Address" name="address">
                                                @error('address')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleLandmark" placeholder="Landmark" name="landmark">
                                                    @error('landmark')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputCity"
                                                placeholder="City" name="city">
                                                @error('city')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="examplePincode" placeholder="Pincode" name="pincode">
                                                    @error('pincode')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="enrollmentDate">Enrollment Date</label>
                                                <input type="date" class="form-control form-control-user" id="enrollmentDate"
                                                placeholder="Enrollment Date" name="enrollment_date">
                                                @error('enrollment_date')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="ExpectedDeliveryDate">Expected Delivery Date</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="ExpectedDeliveryDate" placeholder="Expected Delivery Date" name="expected_delivery_date">
                                                    @error('expected_delivery_date')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit2">InPerson Visit2 from</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisit2"
                                                placeholder="InPerson Visit2 from" name="in_person_from_visit2">
                                                @error('in_person_from_visit2')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="in_person_to_visit2">InPerson Visit2 to</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit2" placeholder="InPerson Visit2 to" name="in_person_to_visit2">
                                                    @error('in_person_to_visit2')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit3">InPerson Visit3 from</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisit3"
                                                placeholder="InPerson Visit3 from" name="in_person_from_visit3">
                                                @error('in_person_from_visit3')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inpersontovisit2">InPerson Visit3 to</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit2" placeholder="InPerson Visit3 to" name="in_person_to_visit3">
                                                    @error('in_person_to_visit3')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit4">InPerson Visit4 from</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisit4"
                                                placeholder="InPerson Visit4 from" name="in_person_from_visit4">
                                                @error('in_person_from_visit4')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="in_person_to_visit4">InPerson Visit4 to</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit4" placeholder="InPerson Visit2 to" name="in_person_to_visit4">
                                                    @error('in_person_to_visit4')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisit5">InPerson Visit5 from</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisit5"
                                                placeholder="InPerson Visit5 from" name="in_person_from_visit5">
                                                @error('in_person_from_visit5')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="in_person_to_visit5">InPerson Visit5 to</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontovisit5" placeholder="InPerson Visit5 to" name="in_person_to_visit5">
                                                    @error('in_person_to_visit5')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="DeliveryDate">Delivery Date(leave empty on initial register)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="DeliveryDate" placeholder=" Delivery Date" name="delivery_date">
                                                    @error('delivery_date')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="inpersonfromvisitfinal">final study follow up at 42 day from</label>
                                                <input type="date" class="form-control form-control-user" id="inpersonfromvisitfinal"
                                                placeholder="InPerson Final from" name="in_person_from_visit_final">
                                                @error('in_person_from_visit_final')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inpersontoFinal">final study follow up at 42 day to</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="inpersontoFinal" placeholder="InPerson Final to" name="in_person_to_visit_final">
                                                    @error('in_person_to_visit_final')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                           Add
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

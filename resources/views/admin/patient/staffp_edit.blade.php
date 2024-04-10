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
                                    <form class="user" method="post" action="{{route('patient.patient_staff_update', $patient->id)}}">
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <h4>Patient Name: {{$patient->firstname}} {{$patient->lastname}}</h4>
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
                                            <div class="col-sm-6">
                                                <label for="DeliveryDate">Delivery Date(leave empty on initial register)</label>
                                                <input type="date" class="form-control form-control-user"
                                                    id="DeliveryDate" placeholder=" Delivery Date" name="delivery_date" value="{{$patient->delivery_date==null?" ":date_format(date_create($patient->delivery_date),"Y-m-d")}}">
                                                    @error('delivery_date')
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

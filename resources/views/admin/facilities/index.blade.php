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
              @include('shared.navbar')
                <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @include('shared.success-message')
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 text-gray-800">Facility</h1>
                    <a href="{{ route('facility.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Facility</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Facilities Details</h6>
                    </div>
                    <div class="card-body">

@if ($editing ?? false)
<form class="user" method="post" action="{{route('facility.update', $facility->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="exampleInputStaffId"
            placeholder="Facility Name" name="facility_name" value="{{$facility->facility_name}}">
            @error('facility_name')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleInputAddress"
            placeholder="Address" name="address" value="{{$facility->address}}">
            @error('address')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user"
                id="exampleLandmark" placeholder="Landmark" name="landmark" value="{{$facility->landmark}}">
                @error('landmark')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleInputCity"
            placeholder="City" name="city" value="{{$facility->city}}">
            @error('city')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user"
                id="examplePincode" placeholder="Pincode" name="pincode" value="{{$facility->pincode}}">
                @error('pincode')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
       Update
    </button>
    <hr>

</form>
@else
<div class="table-responsive">


                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <tbody>
                                    <tr>
                                        <th>Facility</th>
                                        <th>:</th>
                                        <td>{{$facility->facility_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <th>:</th>
                                        <td>{{$facility->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Landmark</th>
                                        <th>:</th>
                                        <td>{{$facility->landmark}}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <th>:</th>
                                        <td>{{$facility->city}}</td>
                                    </tr>
                                    <tr>
                                    <th>Pincode</th>
                                    <th>:</th>
                                        <td>{{$facility->pincode}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            @endif

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

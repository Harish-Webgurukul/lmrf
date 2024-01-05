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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Operator Detail</h1>

                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-10 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Operator Detail</h6>
                                </div>
                                <div class="card-body">
                                    @if ($editing ?? false)
                                    <form class="user" method="post" action="{{route('update_operator', $user->id)}}">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputStaffId"
                                                placeholder="Staff Id" name="staff_id" value="{{$user->staff_id}}">
                                                @error('staff_id')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                    placeholder="First Name" name="firstname" value="{{$user->firstname}}">
                                                    @error('firstname')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                    placeholder="Last Name" name="lastname" value="{{$user->lastname}}">
                                                    @error('lastname')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Email Address" name="email" value="{{$user->email}}">
                                                @error('email')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Password" name="password">
                                                    <small class="text-danger">Enter New Password to Change!</small>
                                                    @error('password')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleInputContact1"
                                                placeholder="Contact1" name="contact1" value="{{$user->contact1}}">
                                                @error('contact1')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleRepeatContact2" placeholder="Contact2" name="contact2" value="{{$user->contact2}}">
                                                    @error('contact2')
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
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Staff Id</th>
                                            <td>{{ $user->staff_id }}</td>
                                        <tr>
                                        <tr>
                                            <th>First Name</th>
                                            <td>{{ $user->firstname }}</td>
                                        <tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>{{ $user->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>

                                        <tr>
                                            <th>Contact1</th>
                                            <td>{{ $user->contact1 }}</td>
                                        </tr>

                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->contact2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Logged In</th>
                                            <td>{{ $user->last_loggedin }}</td>
                                        </tr>
                                    </table>
                                    </div>
                                    @endif
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

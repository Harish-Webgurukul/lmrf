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
                    <h1 class="h3 mb-2 text-gray-800">View Patients</h1>
                    <a href="{{ route('add_patient') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Patient</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Patients Details</h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Study Id</th>
                                        <th>Staff Id</th>
                                        <th>Contact1</th>
                                        <th>Contact2</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Study Id</th>
                                        <th>Staff Id</th>
                                        <th>Contact1</th>
                                        <th>Contact2</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ( $patients as $patient)
                                    <tr>
                                        <td>{{$patient->firstname}}</td>
                                        <td>{{$patient->lastname}}</td>
                                        <td>{{$patient->study_id}}</td>
                                        <td>{{$patient->staff_id}}</td>
                                        <td>{{$patient->contact1}}</td>
                                        <td>{{$patient->contact2}}</td>
                                        <td>
                                            <a href="{{ route('viewone_patient', ['patient_id'=>$patient->id]) }}" class="btn btn-primary btn-sm mb-1"><i class="fas fa-fw fa-eye"></i></a>

                                            <a href=""><i class="fas fa-fw fa-edit text-warning"></i></a>
                                            <a href=""><i class="fas fa-fw fa-trash text-danger"></i></a>

                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No Data Found</td>
                                        <td>No Data Found</td>
                                        <td>No Data Found</td>
                                        <td>No Data Found</td>
                                        <td>No Data Found</td>
                                        <td>No Data Found</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
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
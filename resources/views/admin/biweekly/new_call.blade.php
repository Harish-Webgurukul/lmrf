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
                    <h1 class="h3 mb-2 text-gray-800">
                        @if ($pending_call ?? false)
                    Pending Call
                    @else
                    New Call
                    @endif
                    </h1>

                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            @if ($pending_call ?? false)
                            Pending Call
                            @else
                            New Call
                            @endif</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ( $patients as $patient)
                                    <tr>

                                        <td class="patient_card p-2">
                                            <p class="mb-1">{{$patient->patient->firstname}} {{$patient->patient->lastname}}<p>
                                            <small>Study Id: ({{$patient->patient->study_id}})</small> |
                                            <small>Staff Id:{{$patient->staff_id}}</small> |
                                            <small>Call Date:{{$patient->call_date}}</small>
                                        </td>
                                        <td class="d-flex  flex-column align-content-between">

                                            @if ($pending_call ?? false)
                                            <a class="btn btn-sm btn-primary mb-1" href="{{ route('pending_call_patient', $patient->id) }}"><i class="fas fa-fw fa-phone-volume"></i></a>
                                            @else
                                            <a class="btn btn-sm btn-primary mb-1" href="{{ route('call_patient', $patient->id) }}"><i class="fas fa-fw fa-phone-volume"></i></a>
                                            @endif</h6>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
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

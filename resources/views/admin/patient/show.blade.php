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
                        <h1 class="h3 mb-0 text-gray-800">Patient Detail</h1>

                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-md-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Patient Detail</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-6 col-12 table-responsive">
                                        <h2 class="text-center">Patient Detail</h2>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Staff Id</td>
                                                    <td>:</td>
                                                    <td>{{ $patient->staff_id }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Study Id</td>
                                                    <td>:</td>
                                                    <td>{{ $patient->study_id }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Patient Name </td>
                                                    <td>:</td>
                                                    <td>{{ $patient->firstname }} {{ $patient->lastname }}</td>
                                                <tr>

                                                <tr>
                                                    <td>Email</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->email }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Contact1</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->contact1 }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Contact2</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->contact2 }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Proxy contact1</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->proxy_contact1 }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Proxy contact2</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->proxy_contact2 }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Facility</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->facility }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Address</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->address }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Landmark</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->landmark }}</td>
                                                <tr>
                                                <tr>
                                                    <td>City</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->city }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Pincode</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->pincode }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Enrollment Date</td>
                                                     <td>:</td>
                                                    <td>{{ $patient->enrollment_date }}</td>
                                                <tr>
                                                <tr>
                                                    <td>Expected delivery date</td>
                                                    <td>:</td>
                                                    <td>{{ $patient->expected_delivery_date }}</td>
                                                <tr>
                                            </table>

                                    </div>

                                    <div class="col-md-6 col-12 table-responsive">
                                        <h2 class="text-center">ANC Detail</h2>
                                            <table class="table table-bordered table-sm" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Visit Number</th>
                                                        <th>From date</th>
                                                        <th>To date</th>
                                                        <th>Status</th>
                                                        <th>Visit Completed On</th>

                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Visit Number</th>
                                                        <th>From date</th>
                                                        <th>To date</th>
                                                        <th>Status</th>
                                                        <th>Visit Completed On</th>

                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    @forelse ($patient->ancvisitis as $ancvisit)
                                                        <tr>
                                                            <td>ANC {{ $ancvisit->visit_number }}</td>
                                                            <td>{{ $ancvisit->from_date }}</td>
                                                            <td>{{ $ancvisit->to_date }}</td>
                                                            <td>{{ $ancvisit->status ? 'Completed' : 'Pending' }}</td>
                                                            <td>{{ $ancvisit->visit_completed_on }}</td>



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

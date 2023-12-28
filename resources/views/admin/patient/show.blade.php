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
                        <div class="col-lg-10 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Patient Detail</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Staff Id</th>
                                            <td>{{ $patient->staff_id}}</td>
                                        <tr>
                                        <tr>
                                            <th>Study Id</th>
                                            <td>{{ $patient->study_id}}</td>
                                        <tr>
                                        <tr>
                                            <th>Patient Name </th>
                                            <td>{{ $patient->firstname}} {{ $patient->lastname}}</td>
                                        <tr>

                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $patient->email}}</td>
                                        <tr>
                                        <tr>
                                            <th>Contact1</th>
                                            <td>{{ $patient->contact1}}</td>
                                        <tr>
                                        <tr>
                                            <th>Contact2</th>
                                            <td>{{ $patient->contact2}}</td>
                                        <tr>
                                        <tr>
                                            <th>Proxy contact1</th>
                                            <td>{{ $patient->proxy_contact1}}</td>
                                        <tr>
                                        <tr>
                                            <th>Proxy contact2</th>
                                            <td>{{ $patient->proxy_contact2}}</td>
                                        <tr>
                                        <tr>
                                            <th>Facility</th>
                                            <td>{{ $patient->facility}}</td>
                                        <tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $patient->address}}</td>
                                        <tr>
                                        <tr>
                                            <th>Landmark</th>
                                            <td>{{ $patient->landmark}}</td>
                                        <tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{ $patient->city}}</td>
                                        <tr>
                                        <tr>
                                            <th>Pincode</th>
                                            <td>{{ $patient->pincode}}</td>
                                        <tr>
                                        <tr>
                                            <th>Enrollment Date</th>
                                            <td>{{ $patient->enrollment_date}}</td>
                                        <tr>
                                        <tr>
                                            <th>Expected delivery date</th>
                                            <td>{{ $patient->expected_delivery_date}}</td>
                                        <tr>
                                        <tr>
                                            <th>Delivery date</th>
                                            <td>{{ $patient->delivery_date}}</td>
                                        <tr>
                                        <tr>
                                            <th>In person visit2 from</th>
                                            <td>{{ $patient->in_person_from_visit2}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person visit2 to</th>
                                            <td>{{ $patient->in_person_to_visit2}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person status2</th>
                                            <td>{{ $patient->in_person_to_status2}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Visit2 Completed</th>
                                            <td>{{ $patient->in_person_visit2_completed}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Note2</th>
                                            <td>{{ $patient->in_person_note2}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Visit3 From</th>
                                            <td>{{ $patient->in_person_from_visit3}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Visit3 To</th>
                                            <td>{{ $patient->in_person_to_visit3}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person status3 To</th>
                                            <td>{{ $patient->in_person_to_status3}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Visit3 completed</th>
                                            <td>{{ $patient->in_person_visit3_completed}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Note3</th>
                                            <td>{{ $patient->in_person_note3}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person visit4 From</th>
                                            <td>{{ $patient->in_person_from_visit4}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Visit4 To</th>
                                            <td>{{ $patient->in_person_to_visit4}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Status4</th>
                                            <td>{{ $patient->in_person_to_status4}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Visit4 Completed</th>
                                            <td>{{ $patient->in_person_visit4_completed}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Note4</th>
                                            <td>{{ $patient->in_person_note4}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person visit5 From</th>
                                            <td>{{ $patient->in_person_from_visit5}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person visit5 To</th>
                                            <td>{{ $patient->in_person_to_visit5}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person visit5 Status</th>
                                            <td>{{ $patient->in_person_to_status5}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person visit5 Status</th>
                                            <td>{{ $patient->in_person_visit5_completed}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Note5</th>
                                            <td>{{ $patient->in_person_note5}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person  Visit Final From</th>
                                            <td>{{ $patient->in_person_from_visit_final}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person  Visit Final To</th>
                                            <td>{{ $patient->in_person_to_visit_final}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Final Status</th>
                                            <td>{{ $patient->in_person_to_statusfinal}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Final Visit Completed</th>
                                            <td>{{ $patient->in_person_visitfinal_completed}}</td>
                                        <tr>
                                        <tr>
                                            <th>In Person Note Final</th>
                                            <td>{{ $patient->in_person_notefinal}}</td>
                                        <tr>
                                    </table>
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

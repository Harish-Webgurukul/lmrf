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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->

                        <div class="row">

                            <div class="col-lg-6">

                                <!-- Overflow Hidden -->
                                <div class="card mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"> Total Enrollment</h6>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-center">STUDY FACILITIES</h6>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Facility</th>
                                                <th>Patient count</th>
                                            </tr>
                                            @foreach ($facility as $key)
                                            <tr>
                                                <td>{{$key->facility_name}}</td>
                                                <td>{{$key->patients_count}}</td>
                                            </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> Today's Call</h6>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>New Calls</th>
                                            <th>{{$new_call}}</th>
                                        </tr>
                                        <tr>
                                            <th>Pending Calls</th>
                                            <th>{{$pending_call}}</th>
                                        </tr>
                                        <tr>
                                            <th>ILS Followup</th>
                                            <th>{{$ils_followup}}</th>
                                        </tr>


                                    </table>
                                </div>
                            </div>
                         </div>
                        </div>
                        <div class="row"> <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> ANC's Visit</h6>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ANC Visit 2</th>
                                            <th>{{$anc_visit2}}</th>
                                        </tr>
                                        <tr>
                                            <th>ANC Visit 3</th>
                                            <th>{{$anc_visit3}}</th>
                                        </tr>
                                        <tr>
                                            <th>ANC Visit 4</th>
                                            <th>{{$anc_visit4}}</th>
                                        </tr>
                                        <tr>
                                            <th>Delivery Visit</th>
                                            <th>{{$anc_visit5}}</th>
                                        </tr>
                                        <tr>
                                            <th>Follow up at 42 Days</th>
                                            <th>{{$anc_visit6}}</th>
                                        </tr>


                                    </table>
                                </div>
                            </div>
                         </div>
                        </div>




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lata Medical Research 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

@endsection

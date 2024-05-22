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

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Generate Report</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="{{route('staff_report')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="fromDate">From Date</label>
                                                <input type="date" class="form-control" id="fromDate"
                                                placeholder="From Date" name="fromDate" required>
                                                @error('fromDate')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="fromDate">To Date</label>
                                                <input type="date" class="form-control"
                                                    id="todate" placeholder="To Date" name="toDate" required>
                                                    @error('toDate')
                                                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-8 mb-3 mb-sm-0">
                                                <label> Select Report Type</label>
                                        <select class="form-control" name="reporttype">
                                            <option value="1">Complete study follow-up data</option>
                                            <option value="2">Expected New calls</option>
                                            <option value="3">Pending calls</option>
                                            <option value="4">Hospital Visit for ILS sample collection</option>
                                            <option value="5">Total ILS symptoms reported</option>
                                            <option value="6">Total Specimen Collected</option>
                                            <option value="7">Total ILS resolved</option>
                                        </select>

                                            @error('reporttype')
                                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                           Generate
                                        </button>
                                        <hr>

                                    </form>
                                </div>
                            </div>

                        </div>
                                  <!-- Content Column -->
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

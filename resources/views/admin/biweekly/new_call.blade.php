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
                    <h1 class="h3 mb-2 text-gray-800">New Call</h1>
                    <a href="{{ route('add_operator') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Operators</a>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">New Call</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Staff Id</th>
                                        <th>Call Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Name</th>
                                        <th>Staff Id</th>
                                        <th>Call Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ( $patients as $patient)
                                    <tr>

                                        <td>{{$patient->patient->firstname}} {{$patient->patient->lastname}} ({{$patient->patient->study_id}})</td>
                                        <td>{{$patient->staff_id}}</td>
                                        <td>{{$patient->call_date}}</td>
                                        <td>

                                            <form method="POST" action="{{ route('call_patient') }}">
                                                @csrf
                                                <input type="hidden" name="study_id" value="{{$patient->id}}"/>
                                                <button class="btn btn-sm btn-success"> <i class="fas fa-fw fa-phone-volume"></i></button>
                                            </form>
                                            <a href="" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
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

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
                    <h1 class="h3 mb-2 text-gray-800">View Facilities</h1>
                    <a href="{{ route('facility.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Facility</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Facilities Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Facilities Name</th>
                                        <th>Address</th>
                                        <th>Landmark</th>
                                        <th>City</th>
                                        <th>Pincode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Facilities Name</th>
                                        <th>Address</th>
                                        <th>Landmark</th>
                                        <th>City</th>
                                        <th>Pincode</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ( $facilities as $facilitie)
                                    <tr>
                                        <td>{{$facilitie->facility_name}}</td>
                                        <td>{{$facilitie->address}}</td>
                                        <td>{{$facilitie->landmark}}</td>
                                        <td>{{$facilitie->city}}</td>
                                        <td>{{$facilitie->pincode}}</td>
                                        <td class="d-flex justify-content-between">
                                            <a href="{{ route('facility.index', $facilitie->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i></a>

                                            <a href="{{ route('facility.edit', $facilitie->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                            <form method="POST" action="{{ route('facility.destroy', $facilitie->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="ms-1 btn-sm btn btn-danger"> <i class="fas fa-fw fa-trash"></i> </button>
                                            </form>

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

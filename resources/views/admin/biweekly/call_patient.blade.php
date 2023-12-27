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
                <div class="card shadow mb-4 col-md-6">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Biweekly Call > New Call</h6>
                    </div>
                    <div class="card-body">

                        <table class="table table-borderless table-striped table-sm" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>Call Date</td>
                                    <td>:</td>
                                    <td>{{date('d-m-Y', strtotime($patient->call_date))}}</td>
                                </tr>
                                <tr>
                                    <td>Patient Name</td>
                                    <td>:</td>
                                    <td>{{$patient->Patient->firstname}} {{$patient->Patient->lastname}}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td>:</td>
                                    <td><small>{{$patient->Patient->address}}<br/>{{$patient->Patient->landmark}} <br/>{{$patient->Patient->city}} <br/> {{$patient->Patient->pincode}}</small></td>
                                </tr>
                                <tr>
                                    <td>Contact1:</td>
                                    <td>:</td>
                                    <td> {{$patient->Patient->contact1}} <a class="btn btn-sm btn-success" href="tel:{{$patient->Patient->contact1}}"> Call </a></td>
                                </tr>
                                <tr>
                                    <td> Contact2:</td>
                                    <td>:</td>
                                    <td> {{$patient->Patient->contact2}} <a class="btn btn-sm btn-success" href="tel:{{$patient->Patient->contact2}}"> Call </a></td>
                                </tr>
                                <tr>
                                    <td>Proxy Contact1:</td>
                                    <td>:</td>
                                    <td> {{$patient->Patient->proxy_contact1}} <a class="btn btn-sm btn-success" href="tel:{{$patient->Patient->proxy_contact1}}"> Call </a></td>
                                </tr>
                                <tr>
                                    <td>Proxy Contact2:</td>
                                    <td>:</td>
                                    <td> {{$patient->Patient->proxy_contact2}} <a class="btn btn-sm btn-success" href="tel:{{$patient->Patient->proxy_contact2}}"> Call </a></td>
                                </tr>
                                <tr>
                                    <td>Call Status:</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control form-control-sm" >
                                            <option>Pending</option>
                                            <option>Failed</option>
                                            <option>Done</option>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>ILS Symptons:</td>
                                    <td>:</td>
                                    <td>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check if ILS</label>
                                          </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Hospital Visit:</td>
                                    <td>:</td>
                                    <td>
                                       <input type="date" class="form-control" name="hospital_visit"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Home Visit:</td>
                                    <td>:</td>
                                    <td>
                                        <input type="checkbox" name="home_visit" value="active"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Note :</td>
                                    <td>:</td>
                                    <td>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Note</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                          </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-center"><input type="submit" class="btn btn-primary btn-md btn-block"></td>
                                </tr>

                            <tbody>
                        </table>
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

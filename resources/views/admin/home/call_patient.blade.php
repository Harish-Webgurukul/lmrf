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
                            </h6>
                        </h1>
                        <a href="{{ route('new_call') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            Back </a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 col-md-6">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Home Visit > No Contact </h6>
                            </h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('home.update_nocontact', ['id' => $patient->id]) }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $patient->id }}" />
                                <input type="hidden" name="call_type" value="{{ $pending_call ?? 0 }}" />
                                <table class="table table-borderless table-striped table-sm" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td>Call Date</td>
                                            <td>:</td>
                                            <td>{{ $patient->visit_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Patient Name</td>
                                            <td>:</td>
                                            <td>{{ $patient->Patient->firstname }} {{ $patient->Patient->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td>:</td>
                                            <td><small>{{ $patient->Patient->address }}<br />{{ $patient->Patient->landmark }}
                                                    <br />{{ $patient->Patient->city }} <br />
                                                    {{ $patient->Patient->pincode }}</small></td>
                                        </tr>
                                        <tr>
                                            <td>Contact1:</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" value="{{ $patient->Patient->contact1 }}" name="contact1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Contact2:</td>
                                            <td>:</td>
                                            <td>
                                            <input  type="text" value="{{ $patient->Patient->contact2 }}" name="contact2"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Proxy Contact1:</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" value="{{ $patient->Patient->proxy_contact1 }}" name="proxy_contact1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Proxy Contact2:</td>
                                            <td>:</td>
                                            <td>
                                                <input value="{{ $patient->Patient->proxy_contact2 }}" name="proxy_contact2"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Visit Status:</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="status">
                                                    <option value="0">Pending</option>
                                                    <option value="1">Failed</option>
                                                    <option value="2">Done</option>
                                                </select>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Note :</td>
                                            <td>:</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Note</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notes"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center"><input type="submit"
                                                    class="btn btn-primary btn-md btn-block" value="Update"></td>
                                        </tr>

                                    <tbody>
                                </table>
                            </form>
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


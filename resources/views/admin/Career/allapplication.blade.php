@extends('admin.layouts.app')
@section('admin_title')
<title>Career -  </title>

@endsection

@section('admin_content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Job Applications</h1>
                    <br>
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of all Application</h6>
                            {{-- <a href="createcareer" class="btn btn-primary" style="float: right" >Create new</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>View Details</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($Apply_job as $Apply_job)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$Apply_job['name']}}</td>
                                                <td>{{$Apply_job['email']}}</td>
                                                <td>{{$Apply_job['phone']}}</td>
                                                <td><a href="application_detail/{{$Apply_job['id']}}" class="btn btn-danger">View more</a></td>
                                            </tr>
                                            
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            {{-- </div> --}}
            <!-- End of Main Content -->



@endsection
@extends('admin.layouts.app')
@section('admin_title')
<title>Home -  </title>

@endsection

@section('admin_content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Home Page Services</h1>
                    <br>
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of all Home Page list</h6>
                            <a href="createhomeservice" class="btn btn-primary" style="float: right" >Create new</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Posted on</th>
                                            <th>View More</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Posted on</th>
                                            <th>View More</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($services as $services)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$services['title']}}</td>
                                                <td>{{$services['content']}}</td>
                                                <td>{{ date('d/m/Y H:i a', strtotime($services['created_at'])) }}</td>
                                                <td><a href="homeservice/{{$services['id']}}" class="btn btn-primary">View more</a></td>
                                                <td><a href="delete_homeservice/{{$services['id']}}" class="btn btn-danger">Delete</a></td>
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
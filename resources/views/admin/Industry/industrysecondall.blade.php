@extends('admin.layouts.app')
@section('admin_title')
<title>Industries -  </title>

@endsection

@section('admin_content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @foreach($industry as $industry)
                    <h1 class="h3 mb-2 text-gray-800">{{ @$industry['title'] }} page Second Section</h1>
                    @endforeach
                    <br>
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ @$industry['title'] }} page Second Section</h6>
                            <a href="../industrysecondcreate/{{$industry_id}}" class="btn btn-primary" style="float: right" >Create new</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>First Content</th>
                                            <th>Second Content</th>
                                            <th>Third Content</th>
                                            <th>View More</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>First Content</th>
                                            <th>Second Content</th>
                                            <th>Third Content</th>
                                            <th>View More</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($testis as $testi)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$testi['content']}}</td>
                                                <td>{{$testi['content_2']}}</td>
                                                <td>{{$testi['content_3']}}</td>
                                                {{-- <td>{{ date('d/m/Y H:i a', strtotime($testi['created_at'])) }}</td> --}}
                                                <td><a href="../industryseconddetail/{{$testi['id']}}/{{$industry_id}}" class="btn btn-primary">View more</a></td>
                                                <td><a href="../industryseconddelete/{{$testi['id']}}/{{$industry_id}}" class="btn btn-danger">Delete</a></td>
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
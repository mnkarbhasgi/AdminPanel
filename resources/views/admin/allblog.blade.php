@extends('admin.layouts.app')
@section('admin_title')
<title>Blogs -  </title>

@endsection

@section('admin_content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Blogs</h1>
                    <br>
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of all Blogs</h6>
                            <a href="createblogs" class="btn btn-primary" style="float: right" >Create new</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Featured content</th>
                                            <th>Posted on</th>
                                            <th>View More</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Featured content</th>
                                            <th>Posted on</th>
                                            <th>View More</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($blog as $blogs)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$blogs['title']}}</td>
                                                <td>{{$blogs['category']}}</td>
                                                <td>{{$blogs['featured_content']}}  </td>
                                                <td>
                                                @php 
                                                    $time = Carbon\Carbon::parse($blogs['created_at'])->format('d/m/Y g:i a'); 
                                                    // print(date_default_timezone_get());    
                                                    // $time = \Timezone::convertToLocal($blogs['created_at']);
                                                @endphp
                                                    {{ $time }} 
                                                    {{-- @displayDate($blogs['created_at'], 'd/m/Y H:i a') --}}
                                                </td>
                                                <td><a href="blog_detail/{{$blogs['id']}}" class="btn btn-primary">View more</a></td>
                                                <td><a href="delete_blog/{{$blogs['id']}}" class="btn btn-danger">Delete</a></td>
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
@extends('admin.layouts.app')
@section('admin_title')
<title>Contact List -  </title>

<style>
</style>

@endsection

@section('admin_content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List of Post a Project</h1>
                    <br>
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Post a Project</h6>
                            {{-- <a href="aboutfirstcreate" class="btn btn-primary" style="float: right" >Create new</a> --}}
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
                                            <th>Company</th>
                                            <th>Domain</th>
                                            <th>Company Size</th>
                                            <th>Service</th>
                                            <th>Budget(In Rupees)</th>
                                            <th>Message</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Company</th>
                                            <th>Domain</th>
                                            <th>Company Size</th>
                                            <th>Service</th>
                                            <th>Budget</th>
                                            <th>Message</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($PostAProject as $PostAProject)
                                            <tr>
                                                <td style="min-width: 50px; max-width: 50px;">{{ $i++ }}</td>
                                                <td style="min-width: 150px; max-width: 300px;">{{$PostAProject['name']}}</td>
                                                <td style="min-width: 150px; max-width: 300px;">{{$PostAProject['email']}}</td>
                                                <td style="min-width: 150px; max-width: 300px;">{{$PostAProject['phone']}}</td>
                                                <td style="min-width: 150px; max-width: 300px;">{{$PostAProject['company']}}</td>
                                                <td style="min-width: 150px; max-width: 300px;">{{$PostAProject['domain']}}</td>
                                                <td style="min-width: 200px; max-width: 300px;">{{$PostAProject['company_size']}}</td>
                                                <td style="min-width: 200px; max-width: 300px;">{{$PostAProject['service']}}</td>
                                                <td style="min-width: 200px; max-width: 300px;">{{$PostAProject['budget']}}</td>
                                                <td style="min-width: 500px; max-width: 501px;">{{$PostAProject['message']}}</td>
                                                <td><a href="contactlistdelete/{{$PostAProject['id']}}" class="btn btn-danger">Delete</a></td>
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


@section('footer-js')

@endsection


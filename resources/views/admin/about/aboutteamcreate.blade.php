@extends('admin.layouts.app')
@section('admin_title')
<title>About us -  </title>

@endsection

@section('admin_content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Our Team section</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    <form action="aboutteaminsert" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInput1">Name</label>
                            <input type="text" name="heading" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter Name" >
                            <small class="form-text error-text">@error('heading'){{$message}}@enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="sub_heading">Sub Title</label>
                            <input type="text" name="sub_heading" class="form-control" id="sub_heading" aria-describedby="emailHelp" placeholder="Enter Sub Heading" >
                            <small class="form-text error-text">@error('sub_heading'){{$message}}@enderror</small>
                        </div>
                                                
                        <div class="form-group">
                        <label for="inputGroupFile01">Upload new right side Image<span class="error-text">*</span></label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="img_name" class="form-control" id="inputGroupFile01" required>
                        </div>
                        <small class="form-text error-text">@error('img_name'){{$message}}@enderror</small>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 48 X 48 px</small>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>



                                        
@endsection
@section('footer-js')


@endsection
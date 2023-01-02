@extends('admin.layouts.app')
@section('admin_title')
<title>Home -  </title>

@endsection

@section('admin_content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Home page services</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    <form action="inserthometesti" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control" id="heading" aria-describedby="emailHelp" placeholder="Enter Title" >
                            <small class="form-text error-text">@error('heading'){{$message}}@enderror</small>

                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <input type="text" name="content" class="form-control" id="content" aria-describedby="emailHelp" placeholder="Enter Content" >
                            <small class="form-text error-text">@error('content'){{$message}}@enderror</small>

                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" class="form-control" id="designation" aria-describedby="emailHelp" placeholder="Enter Designation" >
                            <small class="form-text error-text">@error('designation'){{$message}}@enderror</small>

                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" class="form-control" id="company" aria-describedby="emailHelp" placeholder="Enter Company Name" >
                            <small class="form-text error-text">@error('company'){{$message}}@enderror</small>
                        </div>
                        
                        <div class="form-group">
                        <label for="inputGroupFile01">Upload new right side Image<span class="error-text">*</span></label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="img_name" class="form-control" id="inputGroupFile01" required>
                        </div>
                        <small class="form-text error-text">@error('img_name'){{$message}}@enderror</small>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 100 X 100 px</small>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>



                                        
@endsection
@section('footer-js')


@endsection
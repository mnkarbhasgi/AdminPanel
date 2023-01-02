@extends('admin.layouts.app')
@section('admin_title')
<title>Services -  </title>

@endsection

@section('admin_content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Service Page</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    <form action="serviceinsert" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInput1">Heading</label>
                            <input type="text" name="heading" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter Title" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInput2">Featured Content</label>
                            <input type="text" name="featured_content" class="form-control" id="exampleInput2" aria-describedby="emailHelp" placeholder="Enter Content" >
                        </div>
                                                
                        <div class="form-group">
                            <label for="inputGroupFile01">Upload new Featured Image<span class="error-text">*</span></label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="featured_img" class="form-control" id="inputGroupFile01" required>
                        </div>
                        <small class="form-text error-text">@error('featured_img'){{$message}}@enderror</small>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 360 X 189 px</small>

                        {{-- <div class="form-group">
                            <label for="inputGroupFile01">Upload new Banner Image</label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="banner_img" class="form-control" id="inputGroupFile01">
                        </div>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 1366 X 351 px</small> --}}

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>



                                        
@endsection
@section('footer-js')


@endsection
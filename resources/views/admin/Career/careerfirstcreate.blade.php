@extends('admin.layouts.app')
@section('admin_title')
<title>Career -  </title>

@endsection

@section('admin_content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Career Page First Section</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    <form action="careerfirstinsert" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="exampleInput2">First Content</label>
                            <input type="text" name="content" class="form-control" id="exampleInput2" aria-describedby="emailHelp" placeholder="Enter Content" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInput2">Second Content</label>
                            <input type="text" name="content_2" class="form-control" id="exampleInput2" aria-describedby="emailHelp" placeholder="Enter Content" >
                        </div>
                                                
                        <div class="form-group">
                            <label for="inputGroupFile01">Upload new Image<span class="error-text">*</span></label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="img" class="form-control" id="inputGroupFile01" required>
                        </div>
                        <small class="form-text error-text">@error('img'){{$message}}@enderror</small>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 360 X 189 px</small>

                        

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>



                                        
@endsection
@section('footer-js')


@endsection
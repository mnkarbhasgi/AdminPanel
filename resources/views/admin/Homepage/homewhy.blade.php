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
                        <h1 class="h3 mb-0 text-gray-800">Home page Why Choose us</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    @foreach($whys as $services)
                    <form action="{{url('/admin/updatehomewhy')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $services['id'] }}" name="id" />
                        <div class="form-group">
                          <label for="exampleInput1">Heading</label>
                          <input type="text" name="heading" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ $services['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput2">Content</label>
                            <input type="text" name="content" class="form-control" id="exampleInput2" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ $services['content'] }}">
                        </div>

                        
                        <div class="form-group">
                            <label for="inputGroupFile01">Old Image</label>
                            <br>
                            @php $file_name = $services['img_name']; @endphp
                            <img class="img" src="{{asset("$file_name")}}" style="min-width: 400px; min-height: 200px; max-width: 1200px;" />
                        </div>
                        <div class="form-group">
                          <label for="inputGroupFile01">Upload new Image</label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="img_name" class="form-control" id="inputGroupFile01">
                        </div>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 48 X 48 px</small>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      @endforeach
                </div>



                                        
@endsection
@section('footer-js')



@endsection
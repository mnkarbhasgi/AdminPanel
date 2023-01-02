@extends('admin.layouts.app')
@section('admin_title')
<title>About us -  </title>

@endsection

@section('admin_content')
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Our Team Section</h1>
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    @foreach($testis as $testi)
                    <form action="{{url('/admin/aboutteamupdate')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $testi['id'] }}" name="id" />
                        <div class="form-group">
                          <label for="exampleInput1">Name</label>
                          <input type="text" name="heading" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ $testi['heading'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput2">Content</label>
                            <input type="text" name="sub_heading" class="form-control" id="exampleInput2" aria-describedby="emailHelp" placeholder="Enter Content" value="{{ $testi['sub_heading'] }}">
                        </div>
                                                
                        <div class="form-group">
                            <label for="inputGroupFile01">Old Image</label>
                            <br>
                            @php $file_name = $testi['pic_path']; @endphp
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
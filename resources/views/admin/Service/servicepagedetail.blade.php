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
                        @foreach($service as $service)
                            @php $title = $service['title']; @endphp
                        @endforeach
                        <h1 class="h3 mb-0 text-gray-800">{{ $title }} Detail Page</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    @foreach($testis as $testi)
                    <form action="{{url('/admin/servicepageupdate')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $testi['id'] }}" name="id" />
                        <input type="hidden" value="{{ $service_id }}" name="service_id" />
                        <div class="form-group">
                          <label for="exampleInput1">Heading</label>
                          <input type="text" name="heading" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ $testi['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="inputGroupFile01">Content</label>
                          </div>
                        <div class="form-group">
                            <textarea class="summernote" name="content" rows="10"> {!! $testi['content'] !!}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInput2">Content</label>
                            <input type="text" name="content" class="form-control" id="exampleInput2" aria-describedby="emailHelp" placeholder="Enter Content" value="{{ $testi['content'] }}">
                        </div> --}}
                                                
                        <div class="form-group">
                            <label for="inputGroupFile01">Old Featured Image</label>
                            <br>
                            @php $file_name = $testi['image_path']; @endphp
                            <img class="img" src="{{asset("$file_name")}}" style="min-width: 400px; min-height: 200px; max-width: 1200px;" />
                        </div>
                        <div class="form-group">
                          <label for="inputGroupFile01">Upload new Featured Image</label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="img" class="form-control" id="inputGroupFile01">
                        </div>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 555 X 292 px</small>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      @endforeach
                </div>



                                        
@endsection
@section('footer-js')

<script type="text/javascript">
    // var gArrayFonts = ['Amethysta','Poppins','Poppins-Bold','Poppins-Black','Poppins-Extrabold','Poppins-Extralight','Poppins-Light','Poppins-Medium','Poppins-Semibold','Poppins-Thin'];
        $(document).ready(function() {
            $('.summernote').summernote(
                {
                    // fontsize: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
                    // fontNames: gArrayFonts,
                    // fontNamesIgnoreCheck: gArrayFonts,
                    // fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
                    fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22' , '24', '28', '32', '36', '40', '48'],
                    followingToolbar: false,
                    dialogsInBody: true,
                    toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['height', ['height']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    // ['fullscreen',['isFullscreen']]
                ],
                // fontsize : 14,
                height: 500,
                }
            );
        });
    </script>


@endsection
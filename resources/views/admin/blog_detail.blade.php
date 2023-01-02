@extends('admin.layouts.app')
@section('admin_title')
<title>Blogs -  </title>

@endsection

@section('admin_content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    @foreach($blog as $blogs)
                    <form action="{{url('/admin/update_blog')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $blogs['id'] }}" name="id" />
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ $blogs['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Select category</label>
                            <select class="form-control" name="category">
                                
                                <option @if($blogs['category'] == 'Software Development')
                                            selected='selected'
                                        @endif
                                        >Software Development </option>
                                <option @if($blogs['category'] == 'Website Development')
                                        selected='selected'
                                        @endif 
                                >Website Development</option>
                                <option @if($blogs['category'] == 'Artificial Intelligence')
                                        selected='selected'
                                        @endif 
                                >Artificial Intelligence</option>
                                <option @if($blogs['category'] == 'Information Security')
                                        selected='selected'
                                        @endif 
                                        >Information Security</option>
                                <option @if($blogs['category'] == 'UI/UX')
                                        selected='selected'
                                        @endif 
                                >UI/UX</option>
                                <option @if($blogs['category'] == 'Big Data & predictive Analysis')
                                        selected='selected'
                                        @endif 
                                >Big Data & predictive Analysis</option>
                                <option @if($blogs['category'] == 'Software & Hitech')
                                        selected='selected'
                                        @endif 
                                >Software & Hitech</option>
                                <option @if($blogs['category'] == 'Tele communication')
                                        selected='selected'
                                        @endif 
                                >Tele communication</option>
                                <option @if($blogs['category'] == 'Automotive')
                                        selected='selected'
                                        @endif 
                                >Automotive</option>
                                <option @if($blogs['category'] == 'Banking & Finance')
                                        selected='selected'
                                        @endif 
                                >Banking & Finance</option>
                                <option @if($blogs['category'] == 'Agriculture')
                                        selected='selected'
                                        @endif 
                                >Agriculture</option>
                                <option @if($blogs['category'] == 'E business & Retail')
                                        selected='selected'
                                        @endif 
                                >E business & Retail</option>
                                <option @if($blogs['category'] == 'Education')
                                        selected='selected'
                                        @endif 
                                >Education</option>
                                <option @if($blogs['category'] == 'Health Care')
                                        selected='selected'
                                        @endif 
                                >Health Care</option>
                                <option @if($blogs['category'] == 'Logistics')
                                        selected='selected'
                                        @endif 
                                >Logistics</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Featured Content</label>
                            <textarea class="form-control" name="featured_content" id="exampleFormControlTextarea1" rows="3"> {{ $blogs['featured_content'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputGroupFile01">Old featured Image</label>
                            @php $file_path = $blogs['featured_image_path']; @endphp
                            <img class="img" src="{{asset("$file_path")}}"  style="min-width: 400px; min-height: 200px; max-width: 1200px;" />
                        </div>
                        <div class="form-group">
                          <label for="inputGroupFile01">Upload new featured Image</label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="featured_image" class="form-control" id="inputGroupFile01">
                        </div>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 1920 X 1200 px</small>

                        <div class="form-group">
                            <label for="inputGroupFile01">Main Blog</label>
                          </div>
                        <div class="form-group">
                            <textarea class="summernote" name="main_blog" rows="10"> {{ $blogs['main_blog'] }}</textarea>
                        </div>
                        
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
                    ['style', ['bold', 'italic', 'underline', 'clear', 'style']],
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
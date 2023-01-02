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
                    <form action="blog_store" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Select category</label>
                            <select class="form-control" name="category">
                                
                                <option>Software Development</option>
                                <option>Website Development</option>
                                <option>Artificial Intelligence</option>
                                <option>Information Security</option>
                                <option>UI/UX</option>
                                <option>Big Data & predictive Analysis</option>
                                <option>Software & Hitech</option>
                                <option>Tele communication</option>
                                <option>Automotive</option>
                                <option>Banking & Finance</option>
                                <option>Agriculture</option>
                                <option>E business & Retail</option>
                                <option>Education</option>
                                <option>Health Care</option>
                                <option>Logistics</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Featured Content</label>
                            <textarea class="form-control" name="featured_content" id="exampleFormControlTextarea1" rows="3" placeholder="Featured Content"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputGroupFile01">Upload featured Image<span class="error-text">*</span></label>
                        </div>
                        <div class="input-group">
                            <input type="file" name="featured_image" class="form-control" id="inputGroupFile01" required>
                        </div>
                        <small class="form-text error-text">@error('featured_image'){{$message}}@enderror</small>
                        <small id="emailHelp" class="form-text text-muted mb-3">Image size : 1920 X 1200 px</small>

                        <div class="form-group">
                            <label for="inputGroupFile01">Main Blog</label>
                          </div>
                        <div class="form-group">
                            <textarea class="summernote" name="main_blog" rows="10"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
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
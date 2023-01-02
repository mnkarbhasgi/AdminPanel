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
                        <h1 class="h3 mb-0 text-gray-800">Career</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    <form action="career_store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Career Title</label>
                          <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" id="location" aria-describedby="location" placeholder="Enter Location">
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" name="experience" class="form-control" id="experience" aria-describedby="experience" placeholder="Enter Experience">
                        </div>
                        <div class="form-group">
                            <label for="opening">opening</label>
                            <input type="text" name="opening" class="form-control" id="opening" aria-describedby="opening" placeholder="Enter Opening">
                        </div>
                        <div class="form-group">
                            <label for="jobtype">Job Type</label>
                            <select class="form-control" name="jobtype" id="jobtype">                                
                                <option>Full Time</option>
                                <option>Part Time</option>
                                <option>On Contract</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brief">Job Brief</label>
                            <textarea name="brief" rows="4" class="form-control" id="brief" aria-describedby="brief" >Job Brief</textarea>
                        </div>
                        <div id="dynamic_field">
                            <div class="form-group">
                                <label for="roles">Roles and Responsibilities</label>
                                <input type="text" name="roles[]" class="form-control" id="roles" aria-describedby="roles" placeholder="Enter Roles">
                            </div>
                        </div>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  <br><br>

                        <div id="dynamic_field2">
                                <div class="form-group">
                                <label for="skills">Required Skills</label>
                                <input type="text" name="skills[]" class="form-control" id="skills" aria-describedby="Skills" placeholder="Enter Skills">
                            </div>
                        </div>
                        <td><button type="button" name="add2" id="add2" class="btn btn-success">Add More</button></td>  <br><br>
                        {{-- <div id="dynamic_field">
                            <div class="form-group">  
                                <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                            </div>
                        </div> --}}

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


        $(document).ready(function(){      
            var postURL = "<?php echo url('addmore'); ?>";
            var i=1;  


            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<div  id="row'+i+'" class="form-group dynamic-added"><td><input type="text" name="roles[]" class="form-control" id="roles" aria-describedby="roles" placeholder="Enter Roles"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-default btn_remove">Remove Text Field</button></td></div>');  
            });

            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });     

            $('#add2').click(function(){  
                i++;  
                $('#dynamic_field2').append('<div  id="row'+i+'" class="form-group dynamic-added"><td><input type="text" name="skills[]" class="form-control" id="skills" aria-describedby="Skills" placeholder="Enter Skills"></td><td><button type="button" name="remove2" id="'+i+'" class="btn btn-default btn_remove2">Remove Text Field</button></td></div>');  
            });

            $(document).on('click', '.btn_remove2', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });
        });
    </script>

@endsection
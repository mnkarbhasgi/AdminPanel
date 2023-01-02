@extends('admin.layouts.app')
@section('admin_title')
<title>Career -  </title>
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('admin_content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Job Openings</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5">
                    @foreach($career as $career)
                    <form action="{{url('/admin/update_career')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $career['id'] }}" name="id" />
                        <div class="form-group">
                          <label for="exampleInputEmail1">Career Title</label>
                          <input type="text" value="{{ $career['title'] }}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" >
                          <small class="form-text error-text">@error('title'){{$message}}@enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" value="{{ $career['location'] }}" name="location" class="form-control" id="location" aria-describedby="location" placeholder="Enter Location">
                            <small class="form-text error-text">@error('location'){{$message}}@enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" value="{{ $career['experience'] }}"  name="experience" class="form-control" id="experience" aria-describedby="experience" placeholder="Enter Experience">
                            <small class="form-text error-text">@error('experience'){{$message}}@enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="opening">opening</label>
                            <input type="text" value="{{ $career['openings'] }}" name="opening" class="form-control" id="opening" aria-describedby="opening" placeholder="Enter Opening">
                            <small class="form-text error-text">@error('opening'){{$message}}@enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="jobtype">Job Type</label>
                            <select class="form-control" name="jobtype" id="jobtype"> 
                                <option @if($career['jobtype'] == 'Full Time')
                                        selected='selected'
                                        @endif 
                                >Full Time</option>
                                <option @if($career['jobtype'] == 'Part Time')
                                        selected='selected'
                                        @endif 
                                >Part Time</option>
                                <option @if($career['jobtype'] == 'On Contract')
                                selected='selected'
                                @endif 
                                >On Contract</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brief">Job Brief</label>
                            <textarea name="brief" rows="4" class="form-control" id="brief" aria-describedby="brief" > {{ $career['brief'] }}</textarea>
                            <small class="form-text error-text">@error('brief'){{$message}}@enderror</small>
                        </div>
                        <div id="dynamic_field">
                            <div class="form-group">
                                <label class="text-bold" for="roles">Roles and Responsibilities : </label>
                                @php $i=0; @endphp
                                @foreach($roles as $role)
                                <div class="rm_blk" id="{{ '1row'.$i }}">
                                <input type="hidden" value="{{ $role['id'] }}" name="roles_id[]"  id="{{ '1rows'.$i }}"/>
                                <input type="hidden" value="{{ $role['career_id'] }}" name="roles_career_id[]" />
                                <input type="text"  value="{{ $role['roles'] }}" name="roles[]" class="form-control mb-2" id="roles" aria-describedby="roles" placeholder="Enter Roles">
                                <td><button type="button" name="remove" id="{{$i}}" class="btn btn-default btn_remove">Delete Above Field</button></td>
                                </div>
                                @php $i++; @endphp
                                @endforeach

                            </div>
                            <small class="form-text error-text">@error('roles.*'){{$message}}@enderror</small>

                        </div>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add Roles </button></td>  <br><br>
                        <div id="dynamic_field2">
                            <div class="form-group">
                                <label class="text-bold" for="skills">Required Skills :</label>
                                @php $j=0; @endphp
                                @foreach($skills as $skill)
                                
                                <div class="rm_blk" id="{{ 'row'.$j }}">
                                <input type="hidden" value="{{ $skill['id'] }}" name="skills_id[]" id="{{ 'rows'.$j }}" />
                                <input type="hidden" value="{{ $skill['career_id'] }}" name="skills_career_id[]" />
                                <input type="text" value="{{ $skill['skills'] }}" name="skills[]" class="form-control mb-2" id="skills" aria-describedby="Skills" placeholder="Enter Skills" >
                                <td><button type="button" name="remove" id="{{$j}}" class="btn btn-default btn_remove2">Delete Above Field</button></td>
                                </div>
                                @php $j++; @endphp
                                @endforeach

                            </div>
                            <small class="form-text error-text">@error('skills.*'){{$message}}@enderror</small>
                        </div>
                        <td><button type="button" name="add2" id="add2" class="btn btn-success">Add Skills</button></td>  <br><br>
                        
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


            var i=1; 
            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<div  id="1row'+i+'" class="form-group dynamic-added"><td><input type="text" name="roles2[]" class="form-control" id="roles" aria-describedby="roles" placeholder="Enter Roles"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-default btn_remove">Delete Above Field</button></td></div>');  
            });

            

            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                // console.log(button_id);
                var role_id = $('#1rows'+button_id).val();
                // console.log(role_id);
        
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type:'POST',
                    url:"{{ url('admin/delete_roles') }}",
                    data:{role_id:role_id},
                    success:function(data){
                        // alert(data.success);
                        $('#1row'+button_id+'').remove();

                    }
                });

            });

            $('#add2').click(function(){  
                i++;  
                $('#dynamic_field2').append('<div  id="row'+i+'" class="form-group dynamic-added"><td><input type="text" name="skills2[]" class="form-control" id="skills" aria-describedby="Skills" placeholder="Enter Skills"></td><td><button type="button" name="remove2" id="'+i+'" class="btn btn-default btn_remove2">Delete Above Field</button></td></div>');  
            });

            $(document).on('click', '.btn_remove2', function(){  
                var button_id = $(this).attr("id");   
                // console.log(button_id);
                var skill_id = $('#rows'+button_id).val();
                // console.log(skill_id);
        
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type:'POST',
                    url:"{{ url('admin/delete_skills') }}",
                    data:{skill_id:skill_id},
                    success:function(data){
                        // alert(data.success);
                        $('#row'+button_id+'').remove();

                    }
                });

            });
        });
    </script>

@endsection
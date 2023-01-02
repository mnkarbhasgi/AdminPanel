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
                        <h1 class="h3 mb-0 text-gray-800">Job Application Detail</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>                 
                    
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-12 pt-5 pb-5 mb-5">
                    @foreach($career as $career)
                        <div class="form-group">
                          <label for="exampleInputEmail1">User name</label>
                          <input type="text" value="{{ $ApplyJob['name'] }}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" >
                        </div>
                        <div class="form-group">
                            <label for="location">User Email</label>
                            <input type="email" value="{{ $ApplyJob['email'] }}" name="location" class="form-control" id="location" aria-describedby="location" placeholder="Enter Location">
                        </div>
                        <div class="form-group">
                            <label for="experience">User Phone</label>
                            <input type="text" value="{{ $ApplyJob['phone'] }}"  name="experience" class="form-control" id="experience" aria-describedby="experience" placeholder="Enter Experience">
                        </div>
                        <div class="form-group">
                            <label for="experience">User Resume : </label>
                            @php $pdfpath = $ApplyJob['filepath']; @endphp
                            <a href="{{url('')}}/{{$pdfpath}}" target="_blank">Download here</a>
                            {{-- <input type="text" value="{{ $ApplyJob['phone'] }}"  name="experience" class="form-control" id="experience" aria-describedby="experience" placeholder="Enter Experience"> --}}
                        </div>
                        <div class="form-group">
                            <label for="opening">Applied For</label>
                            <input type="text" value="{{ $career['title'] }}" name="opening" class="form-control" id="opening" aria-describedby="opening" placeholder="Enter Opening">
                        </div>
                        <div class="form-group">
                            <label for="opening">Location</label>
                            <input type="text" value="{{ $career['location'] }}" name="opening" class="form-control" id="opening" aria-describedby="opening" placeholder="Enter Opening">
                        </div>
                        <div class="form-group">
                            <label for="opening">Experience</label>
                            <input type="text" value="{{ $career['experience'] }}" name="opening" class="form-control" id="opening" aria-describedby="opening" placeholder="Enter Opening">
                        </div>
                        <div class="form-group">
                            <label for="opening">Opening</label>
                            <input type="text" value="{{ $career['openings'] }}" name="opening" class="form-control" id="opening" aria-describedby="opening" placeholder="Enter Opening">
                        </div>
                        <div class="form-group">
                            <label for="opening">Job Type</label>
                            <input type="text" value="{{ $career['jobtype'] }}" name="opening" class="form-control" id="opening" aria-describedby="opening" placeholder="Enter Opening">
                        </div>
                        <div class="form-group">
                            <label for="opening">Job Brief</label>
                            <textarea name="brief" rows="4" class="form-control" id="brief" aria-describedby="brief" > {{ $career['brief'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-bold" for="roles">Roles and Responsibilities : </label>
                            <ul>
                                @php $i=0; @endphp
                                @foreach($roles as $role)
                                    <li>{{ $role['roles'] }}</li>
                                @php $i++; @endphp
                                @endforeach
                            </ul>

                        </div>
                        <div class="form-group">
                            <label class="text-bold" for="skills">Required Skills :</label>
                                <ul>
                                @php $j=0; @endphp
                                @foreach($skills as $skill)
                                    <li>{{ $skill['skills'] }}</li>
                                @php $j++; @endphp
                                @endforeach
                                </ul>
                        </div>

                        
                      </form>
                      @endforeach
                </div>



                                        
@endsection
@section('footer-js')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote(
                {
                    fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22' , '24', '28', '32', '36', '40', '48'],
                    followingToolbar: false,
                    dialogsInBody: true,
                    toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['height', ['height']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                height: 500,
                }
            );
        });


    </script>

@endsection
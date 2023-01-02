@extends('layouts.app')
@section('title')
<title>Career Detail</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">

<style>
.intl-tel-input {
  display: table-cell;
}
.intl-tel-input .selected-flag {
  z-index: 4;
}
.intl-tel-input .country-list {
  z-index: 5;
}
.input-group .intl-tel-input .form-control {
  border-top-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
}
.error{
    color: red;
}
.unhide{
    display: inline-block;
    color: red;
}



/* formatting budget */
/* .field__value, .field__formatted {
  padding: 24px 36px;
  width: 240px;
  border: none;
  border-radius: 40px;
  transition: ease-in-out 0.3s; */
}
.field__value:focus, .field__formatted:focus {
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.12), 0px 3px 12px rgba(0, 0, 0, 0.12);
}
.field__value:focus + .field__label, .field__formatted:focus + .field__label {
  transform: translateY(-4px);
  color: black;
}

/* THE CSS REQUIRED FOR THIS TO WORK SMOOTHLY */
.field__container {
  display: flex;
  position: relative;
  cursor: text;
}
.field__container .field__value {
  -ms-user-select: none;
  /*for IE*/
  user-select: none;
}
.field__container .field__value ::selection {
  background-color: #FFA;
  color: #000;
}
.field__container .field__formatted {
  position: absolute;
  padding: 24px 36px;
  /*same padding as the input */
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
}

</style>

@endsection

@section('content')

    <div class="blog-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    Career Detail
                </h1>
            </div>
    
        </div>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <div class="career-detail">
                @foreach($career as $career)
                <h2>{{ $career['title'] }}</h2>
                <p><span>Location: {{ $career['location'] }}</span> | <span>Exp: {{ $career['experience'] }} yrs</span> | <span>Job Type: {{ $career['jobtype'] }}</span></p>
                
                <h3>Job Brief</h3>
                <p>{{ $career['brief'] }}</p>

                <h3>Role & Responsibilty</h3>
                <div class="career-detail-lis">
                    <ul>
                        @foreach($roles as $roles)
                            <li>{{ $roles['roles']}}</li>
                        @endforeach
                    </ul>
                </div>

                <h3>Preferred Skills & Abilities</h3>
                <div class="career-detail-lis">
                    <ul>
                        @foreach($skills as $skills)
                            <li>{{ $skills['skills']}}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
                <hr>

                <h3 class="pt-5">Apply for this Job</h3>
                <form action="../Apply_job" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- @foreach($career as $career) --}}
                    <input type="hidden" value="{{ $career['id']}}" name="carrer_id">
                    {{-- @endforeach --}}

                    <div class="col-lg-12 form pd-l-0">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 new-col">
                                <label for="name">Name<span class="required"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="50" required>
                                <small class="form-text error-text">@error('name'){{$message}}@enderror</small>
                            </div>
                            <div class="col-lg-4 col-sm-12 new-col">
                                <label for="email">Email Id<span class="required"> * </span></label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                <small class="form-text error-text">@error('email'){{$message}}@enderror</small>
                            </div>
                            <div class="col-lg-4 col-sm-12 new-col">
                                <label for="number">Phone Number<span class="required"> * </span></label>
                                <input type="hidden" id="c_code" name="c_code" />
                                <input id="tell" type="tel" name="number" class="form-control"  maxlength="13" onkeyup="ValidateNumberOnly()" onkeydown="ValidateNumberOnly()" required>
                                {{-- <input type="text" class="form-control" id="number" name="number" maxlength="13" onkeyup="ValidateNumberOnly()" onkeydown="ValidateNumberOnly()" required> --}}
                                <small class="form-text error-text">@error('number'){{$message}}@enderror</small>
                                <span id="new-error-msg"></span>
                                <span id="valid-msg"></span>
                        </div>

                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-1 col-sm-12 new-col file-label">
                                <label for="files">Attach Resume<span class="required"> * </span>:</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 new-col file-padding">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="files" name="files" required>
                                    <small class="form-text error-text">@error('files'){{$message}}@enderror</small>
                                </div>
                                {{-- <label for="files">Attach Resume<span class="required"> * </span>:</label>
                                <input type="file" class="form-control" id="files" name="files" required>
                                <small class="form-text error-text">@error('files'){{$message}}@enderror</small> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 new-col">
                                <input type="submit" class="btn btn-primary career-btn" id="submit" name="submit" value="Apply Now" >
                            </div>
                        </div>
                    </div>

                  </form>

            </div>
        </div>
    </div>
 
    <div class="container our-blog">
        <div class="our-blog-header" data-wow-duration="1s" data-wow-delay="0.2s">
            <h2>Related <span>Blogs</span></h2>
        </div>
        <div class="col-lg-12">
            <div class="row">
                @foreach($blog as $blogs)
                <div class="col-lg-4 ">
                    <div class="blog-sec">
                        @php $file_name = $blogs['featured_image_path']; @endphp
                        <div class="img-sec wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                            <img class="card-img-top card-img-h" src="{{ asset("$file_name") }}" />
                        </div>
                        <h2>{{$blogs['title']}}</h2>
                        @php $truncated = Str::limit($blogs['featured_content'], 185, '...'); @endphp
                        {{-- <p>{{str_limit($blogs['featured_content'], 10)}}</p> --}}
                        <p>{{ $truncated }} </p>
                        @php $blog = $blogs['id']; @endphp
                        <a href="{{ url('blog_details/'.$blog) }}">Know More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
@section('footer-js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>

<script>

function ValidateNumberOnly()
{
    var ele = document.querySelectorAll('#tell')[0];
    ele.onkeypress = function(e) {
        if(isNaN(this.value+""+String.fromCharCode(e.charCode)))
            return false;
    }
    ele.onpaste = function(e){
        e.preventDefault();
    }
}

// $('#name').on('keypress', function (event) {
//     var regex = new RegExp("^[a-zA-Z0-9]+$");
//     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
//     if (!regex.test(key)) {
//     event.preventDefault();
//     return false;
//     }
// });

$('#name').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z0-9 .]/gi,
        v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});


$(document).ready(function() {
    // console.log( "ready!" );
    
    var telInput = $("#tell");
    let errorMsg = $("#new-error-msg");
    var validMsg = $("#valid-msg");
    let c_code = $("#c_code");

    // initialise plugin
    telInput.intlTelInput({

    allowExtensions: true,
    formatOnDisplay: true,
    autoFormat: true,
    autoHideDialCode: true,
    autoPlaceholder: true,
    defaultCountry: "auto",
    ipinfoToken: "yolo",

    nationalMode: false,
    numberType: "MOBILE",
    // initialCountry: "in",
    //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    preferredCountries: ['in', 'us'],
    preventInvalidNumbers: true,
    separateDialCode: true,
    initialCountry: "in",

    });

    var reset = function() {
    telInput.removeClass("error");
    errorMsg.addClass("hide");
    validMsg.addClass("hide");
    };

    // on blur: validate
    telInput.blur(function() {
        reset();
            if ($.trim(telInput.val())) {
                if (telInput.intlTelInput("isValidNumber")) {
                validMsg.removeClass("hide");
                } else {
                telInput.addClass("error");
                errorMsg.removeClass("hide");
                errorMsg.show();
                errorMsg.addClass("unhide");
                document.getElementById('new-error-msg').innerHTML = "Not a valid Number";
                // errorMsg.innerHTML = "Wrong Input";
                // console.log(errorMsg);
                $(this).val('');
            }
        }
    });
    telInput.on("blur", function(){  
        // $(this).val('');
        $(this).val($(this).val());
        $(c_code).val("+" + $(".country[class*='active']").attr("data-dial-code"));
        // console.log($(this).val("+" + $(".country[class*='active']").attr("data-dial-code") + $(this).val()));  
    });

    // on keyup / change flag: reset
    telInput.on("keyup change", reset);

});


</script>

@endsection

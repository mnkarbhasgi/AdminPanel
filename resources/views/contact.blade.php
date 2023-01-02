@extends('layouts.app')
@section('title')
<title>Contact Us -  </title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">

<style>
/* .intl-tel-input {
  display: table-cell;
  min-width: 300px !important;
} */
.intl-tel-input{
    display: block;
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
        transition: ease-in-out 0.3s; 
    } */
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



<input id="phone" type="tel">
<span id="valid-msg" class="hide">Valid</span>
<span id="error-msg" class="hide">Invalid number</span>


    <div class="service-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    Our Pricing Is Simple
                </h1>
            </div>
    
        </div>
    </div>
 
    <div class="container contact">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5 contact-left">
                    <div class="get-in-touch">
                        <h2>Get In <span>Touch</span></h2>
                        <p>Do you want to consult & find more information, Please contact us.</p>
                        <div class="contact-detail">
                            <div class="row">
                                <div class="col-1 pd-r-0 pd-l-0">
                                    <img src="assets/images/phone-call.png" alt="">
                                </div>
                                <div class="col-11 pd-r-0 pd-l-0">
                                    <a href="tel:+9180413763000" style="font-weight: 600" >+91 80413763000</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 pd-r-0 pd-l-0">
                                    <img src="assets/images/email.png" alt="">
                                </div>
                                <div class="col-11 pd-r-0 pd-l-0">
                                    <a href="mailto:director@vmokshagroup.com" style="font-weight: 600">director@vmokshagroup.com</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 pd-r-0 pd-l-0">
                                    <img src="assets/images/pin.png" alt="">
                                </div>
                                <div class="col-11 pd-r-0 pd-l-0">
                                    <span class="addr">#2799 & 2800, Srinidhi, Sector-1, 27th Main, HSR Layout, Bangalore - 560102, Karnataka, India.</span>
                                </div>
                            </div>
                            {{-- <div >
                                <img src="assets/images/phone-call.png" alt=""><span><a href="tel:+9180413763000" >+91 80413763000</a></span><br>
                            </div>
                            <div>
                                <img src="assets/images/email.png" alt=""><span><a href="mailto:director@vmokshagroup.com" >director@vmokshagroup.com</a></span>
                            </div>
                            <div>
                                <img src="assets/images/pin.png" alt=""><span class="addr">#2799 & 2800, Srinidhi, Sector-1, 27th Main, HSR Layout, Bangalore - 560102, Karnataka, India.</span>
                            </div> --}}
                        </div>

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="project-form">
                        <h2>Post Project </h2>
                        @if(Session::has('alert_class'))
                            <p class="alert alert-success">{{ Session::get('alert_class') }}</p>
                        @endif
                        <form action="add_contact" method="POST" class="contact-form">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label>Name <span class="required"> * </span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="First name" maxlength="45" required>
                                    <small class="form-text error-text">@error('name'){{$message}}@enderror</small>
                                </div>
                                <div class="col">
                                    <label>Email Id <span class="required"> * </span></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email-Id" maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true">
                                    <small class="form-text error-text">@error('email'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Phone Number <span class="required"> * </span></label>
                                    <input type="hidden" id="c_code" name="c_code" />
                                    <input id="tell" type="tel" name="number" class="form-control"  maxlength="13" onkeyup="ValidateNumberOnly()" onkeydown="ValidateNumberOnly()" required>
                                    <small class="form-text error-text">@error('number'){{$message}}@enderror</small>
                                    <span id="new-error-msg"></span>
                                    <span id="valid-msg"></span>
                                </div>

                                <div class="col">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company" placeholder="Company Name"  maxlength="100">
                                    <small class="form-text error-text">@error('company'){{$message}}@enderror</small>
                                </div>
                            </div>
                            
                          
                            <div class="row">
                                <div class="col">
                                    <label>Select Domain</label>
                                    <select class="form-select" aria-label="Select Domain" name="domain" >
                                        <option value=""> Select Any One </option>
                                        <option value="Agriculture" > Agriculture </option>
                                        <option value="Automotive"> Automotive </option>
                                        <option value="E-Business & Retail"> E-Business & Retail </option>
                                        <option value="Education"> Education </option>
                                        <option value="Health Care" > Health Care </option>
                                        <option value="Tele Communication" > Tele Communication </option>
                                        <option value="Technology" > Technology </option>
                                        <option value="IOT (Internet of Things)" > IOT (Internet of Things) </option>
                                        <option value="Sports Entertainment" > Sports Entertainment </option>
                                        <option value="Food & Beverages" > Food & Beverages </option>
                                        <option value="Advertisements" > Advertisements </option>
                                        <option value="Legal" > Legal </option>
                                        <option value="Hospitality" > Hospitality </option>
                                        <option value="Social Media" > Social Media </option>
                                        <option value="Others" > Others </option>
                                    </select>
                                    <small class="form-text error-text">@error('domain'){{$message}}@enderror</small>
                                </div>
                                <div class="col">
                                    <label>Select Company Size</label>
                                    <select class="form-select" aria-label="Select Company Size" name="c_size">
                                        <option value=""> Select Any One </option>
                                        <option value="Startup"> Startup </option>
                                        <option value="Enterprise"> Enterprise </option>
                                        <option value="Small & Medium Enterprise"> Small & Medium Enterprise </option>
                                        <option value="Idea Stage"> Idea Stage </option>
                                        <small class="form-text error-text">@error('c_size'){{$message}}@enderror</small>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Select Service</label>
                                    <select class="form-select" aria-label="Select Service" name="service" >
                                        <option value=""> Select Any One </option>
                                        <option value="Software Development"> Software Development</option>
                                        <option value="Infrastructure & Cloud"> Infrastructure & Cloud </option>
                                        <option value="AI & ML"> AI & ML </option>
                                        <option value="Information Security"> Information Security </option>
                                        <option value="UI & UX" > UI & UX </option>
                                        <option value="Application Engineering & Maintainance" > Application Engineering & Maintainance </option>
                                        <option value="Mobile Application Developement" > Mobile Application Developement </option>
                                        <option value="Business Process Outsourcing" > Business Process Outsourcing </option>
                                        <option value="Data Ware Housing" > Data Ware Housing </option>
                                        <option value="Digital Marketing" > Digital Marketing </option>
                                        <option value="IT Staffing" > IT Staffing </option>
                                        <option value="DevOps" > DevOps </option>
                                        <option value="Sofwate Testing & QA" > Sofwate Testing & QA </option>
                                    </select>
                                    <small class="form-text error-text">@error('service'){{$message}}@enderror</small>
                                </div>
                                <div class="col">
                                    <label>Budget Estimation ? (Rs)</label>
                                    <input type="text" class="form-control field__formatted" name="budget" id="budget" maxlength="30" placeholder="Budget Estimation">
                                    <input type="hidden" class="field__value" />
                                    <small class="form-text error-text">@error('budget'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="5" name="message" placeholder="Message" onkeyup="textCounter(this,'counter',250);" maxlength="250"></textarea>
                                    <p><span id="counter">250</span> Characters left</p>
                                    <small class="form-text error-text">@error('message'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col post-proj-btn">
                                    <input type="submit" name="post-project" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

    $('.field__formatted').keyup(function(event) {

        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value){
            return value
            .replace(/\D/g, "")
                .replace(/([0-9])([0-9]{3})$/, '$1,$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
            ;
        });
        // $(this).siblings('.field__value').val($(this).val().replace(/,/g, ''))
    });

    // $(document).ready(function() {
    //     $("#tell").intlTelInput({
    //         initialCountry: "in",
    //         separateDialCode: true,
    //         preferredCountries: ['in', 'us'],
    //         // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    //     });
    // });

    function textCounter(field,field2,maxlimit)
    {
        var countfield = document.getElementById(field2);
        if ( field.value.length > maxlimit ) {
            field.innerHTML = field.value.substring( 0, maxlimit );
            return false;
        } else {
            countfield.innerHTML = maxlimit - field.value.length;
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

    function ValidateNumberOnly2()
    {
        var ele = document.querySelectorAll('#budget')[0];
        ele.onkeypress = function(e) {
            if(isNaN(this.value+""+String.fromCharCode(e.charCode)))
                return false;
        }
        ele.onpaste = function(e){
            e.preventDefault();
        }
    }

</script>
{{-- 7325152189 --}}
@endsection

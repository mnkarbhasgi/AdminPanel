@extends('layouts.app')
@section('title')
<title>Home -  </title>
<meta name="title" content="Managed IT Services | IT Solutions Company in Bangalore - Vmoksha" >
<meta name="description" content="Vmoksha is an IT Solutions Company that provides cutting-edge IT Services and solutions to a diversified range of businesses across the globe. Our services such as Infrastructure and Cloud Services, Software Development, IT Outsourcing, etc" >

<style>

</style>
@endsection

@section('content')


        <!-- ***** Header Area End ***** -->
        <div class="main-banner" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="container home-main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <div class="left-content header-text Left" data-wow-duration="1s" data-wow-delay="1s">
                                    <h1>Turn your ideas </h1>
                                    <h2>into a <span class="d-block d-sm-none"></span><span class="typed-text"></span><span class="cursor">&nbsp;</span> </h2>
                                    <p>Vmoksha Technologies Private Limited started its journey in may 2001.</p>
                                    <a href="contact"><div class="main-white-button">GET A QUOTE</div></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-image Right" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <img src="assets/images/Group1.png" alt="team meeting">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="about" class="about-us section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left-image " data-wow-duration="1s" data-wow-delay="0.2s">
                            <img src="assets/images/about-left.png" alt="person graphic">
                        </div>
                    </div>
                    <div class="col-lg-8 align-self-center our-service">
                        <p class="sub-heading " data-wow-duration="1s" data-wow-delay="0.4s">Our Services</p>
                        <h2 class=" ourservice-h2" data-wow-duration="1s" data-wow-delay="0.4s">Offering Best <span>Services</span></h2>
                        <div class="services">
                            <div class="row">
                                @foreach($Homeservices as $Homeservices)
                                <div class="col-lg-6">
                                    <div class="item " data-wow-duration="1s" data-wow-delay="1.1s">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-3 col-xs-3 col-3 icon" >
                                                @php $img = $Homeservices['img_name']; @endphp
                                                <img src="{{asset("$img")}}" alt="">
                                            </div>
                                            <div class="col-lg-10 col-sm-9 col-xs-9 col-9">
                                                <h4>{{ $Homeservices['title'] }}</h4>
                                                @php $truncated1 = Str::limit($Homeservices['content'], 100, '...'); @endphp
                                                <p>{{ $truncated1 }} </p>
                                            </div>
                                        </div>
                                        {{-- <div class="icon">
                                            @php $img = $Homeservices['img_name']; @endphp
                                            <img src="{{asset("$img")}}" alt="">
                                        </div>
                                        <div class="right-text">
                                            <h4>{{ $Homeservices['title'] }}</h4>
                                            @php $truncated1 = Str::limit($Homeservices['content'], 60, '...'); @endphp
                                            <p>{{ $truncated1 }} </p>
                                        </div> --}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="portfolio" class="our-portfolio section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 offset-lg-12">
                        <div class="section-heading  " data-wow-duration="1s" data-wow-delay="0.2s">
                            <h2>Why <span>Choose Us</span></h2>
                            <p>Vmoksha utilizes the best software development practices to serve clients with a standard
                                solution. With our effective service, we provide an opportunity for small and big enterprise to achieve their goals.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php $k = 1; @endphp
                    @foreach($HomeWhy as $HomeWhy)
                        @if($k == 1)
                            <div class="col-lg-6 col-md-6 col-sm-12 why-us-main">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-6 col-12 img-sec " data-wow-duration="1s" data-wow-delay="0.4s">
                                        @php $img = $HomeWhy['img_name']; @endphp
                                        <img src="{{asset("$img")}}" alt="">
                                    </div>
                                    <div class="col-lg-7 col-sm-6 col-12 why-us-left why-us-left-bg " data-wow-duration="1s" data-wow-delay="0.2s">
                                        <div class="heading-left">
                                            <h2>{{ $HomeWhy['title'] }}</h2>
                                        </div>
                                        <div class="why-us-text">
                                            <p>{{ $HomeWhy['content'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($k == 2)
                            <div class="col-lg-6 col-md-6 col-sm-12 why-us-main">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-6 col-12 img-sec " data-wow-duration="1s" data-wow-delay="0.4s">
                                        @php $img = $HomeWhy['img_name']; @endphp
                                        <img src="{{asset("$img")}}" alt="">
                                    </div>
                                    <div class="col-lg-7 col-sm-6 col-12 why-us-left " data-wow-duration="1s" data-wow-delay="0.2s">
                                        <div class="heading-left">
                                            <h2>{{ $HomeWhy['title'] }}</h2>
                                        </div>
                                        <div class="why-us-text">
                                            <p>{{ $HomeWhy['content'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($k == 3)
                            <div class="col-lg-6 col-md-6 col-sm-12 why-us-main">
                                <div class="row why_us_right">
                                    <div class="col-lg-7 col-sm-6 col-12 why-us-right why-us-bg " data-wow-duration="1s" data-wow-delay="0.2s">
                                        <div class="heading-right">
                                            <h2>{{ $HomeWhy['title'] }}</h2>
                                        </div>
                                        <div class="why-us-text">
                                            <p>{{ $HomeWhy['content'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-6 col-12 img-sec " data-wow-duration="1s" data-wow-delay="0.4s">
                                        @php $img = $HomeWhy['img_name']; @endphp
                                        <img src="{{asset("$img")}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @elseif($k == 4)
                            <div class="col-lg-6 col-md-6 col-sm-12 why-us-main">
                                <div class="row why_us_right">
                                    <div class="col-lg-7 col-sm-6 col-12 why-us-right why-us-bg " data-wow-duration="1s" data-wow-delay="0.2s">
                                        <div class="heading-right">
                                            <h2>{{ $HomeWhy['title'] }}</h2>
                                        </div>
                                        <div class="why-us-text">
                                            <p>{{ $HomeWhy['content'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-6 col-12 img-sec" data-wow-duration="1s" data-wow-delay="0.4s">
                                        @php $img = $HomeWhy['img_name']; @endphp
                                        <img src="{{asset("$img")}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php $k++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
        
        
        
        <div class="container-fluid our-client">
            <div class="our-client-header " data-wow-duration="1s" data-wow-delay="0.2s">
				<h2>Our <span>Clients</span></h2>
			</div>
            <div class="row">
                <div class="container-fluid">
                    <section class="logo-carousel slider" data-arrows="true">
                        @foreach($ClientLogo as $ClientLogo)
                        @php $image = $ClientLogo['img_path']; @endphp
                        <div class="slide"><img src="{{asset("$image")}}"></div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
        <div class="container-fluid testi-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 testi-left">
                        <div class="tisti-first-img">
							<img src="assets/images/Ellipse-72.png"/>
                        </div>
                        <h5>Testimonial</h5>
                        <h2>We give our Best To Make You Happy</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
                    <div class="col-lg-6 testi-right">
                        <div class="testi-card">
                            <div class="testi-slider">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @php $m=0; @endphp
                                        @foreach($Testimonial as $Testimonials)
                                            @if($m == 0)
                                            <li data-target="#myCarousel" data-slide-to="{{$m}}" class="active"></li>
                                            @else
                                            <li data-target="#myCarousel" data-slide-to="{{$m}}" ></li>
                                            @endif
                                        @php $m++; @endphp
                                        @endforeach
                                    </ol>
                                
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        @php $l=1; @endphp
                                        @foreach($Testimonial as $Testimonial)
                                        @if($l == 1)
                                        <div class="item active">
                                        @else
                                        <div class="item">
                                        @endif
                                            <div class="testi-slider-image">
                                                    <div class="py-3 silder-img">
                                                        @php $img = $Testimonial['pic_name']; @endphp
                                                        <img src="{{asset("$img")}}" alt="">
                                                </div>
                                                <div class="py-3 silder-text">
                                                    <p>{{ $Testimonial['content'] }}</p>
                                                </div>
                                                <div class="py-3 silder-heading">
                                                    <h3>{{ $Testimonial['title'] }}</h3>
                                                    <p>{{ $Testimonial['designation'] }}, {{ $Testimonial['company'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @php $l++; @endphp
                                        @endforeach
                               
                                        
                                  
                                    </div>
                                
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="container our-blog">
			<div class="our-blog-header " data-wow-duration="1s" data-wow-delay="0.2s">
				<h2>Our <span>Blogs</span></h2>
			</div>
            <div class="col-lg-12">
                <div class="row">
                    @foreach($blog as $blogs)
                    <div class="col-lg-4 ">
                        <div class="blog-sec">
                            @php $file_name = $blogs['featured_image_path']; @endphp
                            <div class="img-sec " data-wow-duration="1s" data-wow-delay="0.4s">
                                <img class="card-img-top card-img-h" src="{{asset("$file_name")}}" />
                            </div>
                            <h2>{{$blogs['title']}}</h2>
                            @php $truncated = Str::limit($blogs['featured_content'], 185, '...'); @endphp
                            <p>{{ $truncated }} </p>
                            @php $blog = $blogs['id']; @endphp
                            <a href="{{ url('blog_details/'.$blog) }}">Know More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        


<script>

$(document).ready(function() {
  $('.logo-carousel').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: true,
    dots: false,
    pauseOnHover: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 520,
      settings: {
        slidesToShow: 2
      }
    }]
  });
});


</script>

<script>
    const typedTextSpan = document.querySelector(".typed-text");
    const cursorSpan = document.querySelector(".cursor");

    const textArray = ["Start Up", "Business", "Enterprise"];
    const typingDelay = 200;
    const erasingDelay = 100;
    const newTextDelay = 2000; // Delay between current and next text
    let textArrayIndex = 0;
    let charIndex = 0;

    function type() {
    if (charIndex < textArray[textArrayIndex].length) {
        if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
        typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
        charIndex++;
        setTimeout(type, typingDelay);
    } 
    else {
        cursorSpan.classList.remove("typing");
        setTimeout(erase, newTextDelay);
    }
    }

    function erase() {
        if (charIndex > 0) {
        if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
        typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex-1);
        charIndex--;
        setTimeout(erase, erasingDelay);
    } 
    else {
        cursorSpan.classList.remove("typing");
        textArrayIndex++;
        if(textArrayIndex>=textArray.length) textArrayIndex=0;
        setTimeout(type, typingDelay + 1100);
    }
    }

    document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
    if(textArray.length) setTimeout(type, newTextDelay + 250);
    });
</script>


@endsection

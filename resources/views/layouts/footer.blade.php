<div class="container-fluid p-proj">
    <h3 class="" data-wow-duration="1s" data-wow-delay="0.4s">Do You Have a Project for Us ?</h3>
    <h2 class="" data-wow-duration="1s" data-wow-delay="0.4s">We're here to help move your business forward</h2>
    <div class="btn-p-proj" data-wow-duration="1s" data-wow-delay="0.4s"><a href="{{url('')}}/pricing">POST PROJECT</a></div>
</div>

<div class="container-fluid footer-details">
    <div class="container" data-wow-duration="1s" data-wow-delay="0.4s">
        <div class="row">
            <div class="col-lg-3 plm-0 foo-logo-sec">
                <div class="footer-img">
                    <img src="{{ asset("assets/images/Vmoksha-Small-white-1@3x.png") }}" />
                </div>
                <p class="footer-text">Our experts will help in quickly delivering the right solution and expertise to each client for their development.</p>
                <div class="social-icons">
                    <div class="row">
                        <div class="s-icon">
                            <a href="https://www.facebook.com/Vmokshagroup" target="_blank">
                                <img src="{{ asset("assets/images/Group_583@3x.png") }}" />
                            </a>
                        </div>
                        <div class="s-icon">
                            <a href="https://www.linkedin.com/company/vmoksha-technologies/" target="_blank" >
                                <img src="{{ asset("assets/images/Group_584@3x.png") }}" />
                            </a>
                        </div>
                        <div class="s-icon">
                            <a href="https://twitter.com/infovmoksha" target="_blank" >
                                <img src="{{ asset("assets/images/Group_585@3x.png") }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 footer-left-side">
                <div class="row">
                    <div class="col-lg-3 footer-mobile">
                        <h6>Company</h6>
                        <ul>
                            <li class="footer-links"><a href="{{url('')}}/about" >About Us</a></li>
                            <li class="footer-links"><a href="{{url('')}}/career">Career</a></li>
                            <li class="footer-links"><a href="{{url('')}}/about#our_team">Our Team</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 footer-mobile">
                        <h6>Quick Links</h6>
                        <ul>
                            @foreach ($industry_navitem2 as $item2)
                                @php $sid2 = $item2->id; @endphp
                                <li class="footer-links"><a href="{{ url('industrydetail', $sid2) }}">{{$item2->title}}</a></li>
                            @endforeach
                            <li class="footer-links"><a href="{{url('')}}/privacy_policy">Privacy Policy</a></li>
                            <li class="footer-links"><a href="{{url('')}}/terms_and_conditions">Terms and Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 footer-mobile">
                        <h6>Services</h6>
                        <ul>
                            @foreach ($service_navitem2 as $item2)
                                @php $sid2 = $item2->id; @endphp
                                <li class="footer-links"><a  href="{{ url('servicesdetail', $sid2) }}">{{$item2->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-3 footer-mobile">
                        <h6>Contact Us</h6>
                        <ul>
                            <li class="footer-links"><a href="mailto:director@vmokshagroup.com">director@vmokshagroup.com</a></li>
                            <li class="footer-links"><a href="mailto:ceo@vmokshagroup.com">ceo@vmokshagroup.com</a></li>
                            <li class="footer-links"><a href="mailto:vp@vmokshagroup.com">vp@vmokshagroup.com</a></li>
                            <li class="footer-links"><a href="tel:8041376300">Call : +91-80-4137 6300</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container-fluid footer-bottom">
        <div class="row">
            <div class="col-lg-12" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>©2021 Vmoksha Technologies Pvt. Ltd . All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/animation.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
<script src="{{ asset('assets/js/templatemo-custom.js') }}"></script>
<!-- jQuery first, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Slick Slider JS -->
<script src="{{ asset('assets/js/slick-js.js') }}"></script>



@yield('footer-js')




<script>
    dynamicNavbar();

    function dynamicNavbar() {
    $('.nav li a').on('click', function() {
        $('.nav li').find('a.active').removeClass('active');
        $(this).parent('a').addClass('active');
    });
    }


</script>

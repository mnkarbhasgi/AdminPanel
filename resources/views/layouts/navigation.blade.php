<header class="header-area header-sticky">
    <div class="container">
        <div class="row mobile-row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="{{ asset('assets/images/vmoksha-logo.png') }}" />
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li ><a href="{{route('about') }}">COMPANY</a></li>
                        <li class="dropdown"><a href="javscript:void(0)" >SERVICES </a>
                            <ul class="dropdown-content" id="drop_drown_1">
                                @foreach ($service_navitem as $item)
                                    {{-- <p>{{$item->name}} </p> --}}
                                    @php $sid = $item->id; @endphp
                                    {{-- href="{{route('servicesdetail/') }}" --}}
                                    <li><a  href="{{ url('servicesdetail', $sid) }}">{{$item->title}}</a></li>
                                @endforeach
                                
                                
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javscript:void(0)">INDUSTRIES </a>
                            <ul class="dropdown-content">
                                @foreach ($industry_navitem as $item)
                                    {{-- <p>{{$item->name}} </p> --}}
                                    @php $sid = $item->id; @endphp
                                    <li><a href="{{ url('industrydetail', $sid) }}">{{$item->title}}</a></li>
                                @endforeach
                                
                            </ul>
                        </li>
                        <li ><a href="{{route('casestudy') }}">CASE STUDY</a></li>
                        <li ><a href="{{route('all_blogs') }}">BLOGS</a></li>
                        {{-- <li ><a href="pricing">PRICING</a></li> --}}
                        <li ><a href="{{route('career') }}">CAREER</a></li>
                        {{-- <li ><a href="#">CAREER</a></li> --}}
                        <li >
                            <div class="main-blue-button"><a href="{{route('pricing') }}">POST A PROJECT</a></div>
                        </li>
                    </ul>
                    <div class="mobile-view">
                    <ul class="nav-mobile">
                        <li ><a href="{{route('about') }}" class="active">COMPANY</a></li>
                        <li class="dropdown dd_1"><a href="#" >SERVICES <i class="fa fa-chevron-down dd-icon" ></i></a>
                            <div class="dd-content_1" id="dd-content"> 
                                <ul class="dropdown-content drop_drown_1" id="drop_drown_1">
                                    @foreach ($service_navitem as $item)
                                        {{-- <p>{{$item->name}} </p> --}}
                                        @php $sid = $item->id; @endphp
                                        {{-- href="{{route('servicesdetail/') }}" --}}
                                        <li><a  href="{{ url('servicesdetail', $sid) }}">{{$item->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown dd_2"><a href="#">INDUSTRIES <i class="fa fa-chevron-down"></i></a>
                            <div class="dd-content_2" id="dd-content"> 
                                <ul class="dropdown-content">
                                    @foreach ($industry_navitem as $item)
                                        {{-- <p>{{$item->name}} </p> --}}
                                        @php $sid = $item->id; @endphp
                                        <li><a href="{{ url('industrydetail', $sid) }}">{{$item->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li ><a href="{{route('casestudy') }}">CASE STUDY</a></li>
                        <li ><a href="{{route('all_blogs') }}">BLOGS</a></li>
                        <li ><a href="{{route('career') }}">CAREER</a></li>
                        <li >
                            <div class="main-blue-button"><a href="{{route('pricing') }}">POST A PROJECT</a></div>
                        </li>
                    </ul>
                    </div>
                    <a class='menu-trigger'>
                    <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

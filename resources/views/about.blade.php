@extends('layouts.app')
@section('title')
<title>About</title>

@endsection

@section('content')

    <div class="about-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 about-heading">
                <h1>
                    ABOUT US
                </h1>
            </div>
    
        </div>
    </div>
    @foreach($AboutFirst as $AboutFirst)
    <div class="about-bg">
        <div class="about-second">
            <div class="about-image">
                <div class="about-img">
                    @php $img = $AboutFirst['pic_name']; @endphp
                    <img src="{{ asset("$img") }}" />
                </div>
            </div>  
            <div class="about-content">
                <div class="content-heading">
                    <h2>{{ $AboutFirst['title'] }}</h2>
                </div>
                <div class="content-p">
                    <p>
                        {{ $AboutFirst['content'] }}
                    </p>
                </div>
            </div>
        </div>
        <div class="about-second">
            <div class="about-content">
                <p>{{ $AboutFirst['content_2'] }}</p>
            </div>
        </div>
    </div>
    @endforeach
 
    <div class="container-fluid about-bg-2">
        <div class="container">
            <div class="row">
                @php $a=1; @endphp
                @foreach($FirstMission as $FirstMission)
                @if($a == 1)
                <div class="col-lg-6">
                    <div class="about-third-content">
                        <div class="content-third-heading">
                            <h2>Our <span>Mission</span></h2>
                        </div>
                        <div class="content-third-p">
                            <p>{{ $FirstMission['content'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-third-image">
                        <div class="about-third-img">
                            @php $image = $FirstMission['pic_name']; @endphp
                            <div class="slide"><img src="{{asset("$image")}}"></div>
                        </div>
                    </div>  
                </div>
                @else
                <div class="col-lg-6">
                    <div class="about-third-image">
                        <div class="about-third-img">
                            @php $image = $FirstMission['pic_name']; @endphp
                            <div class="slide"><img src="{{asset("$image")}}"></div>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="about-third-content">
                        <div class="content-third-heading">
                            <h2>Our <span>Vision</span></h2>
                        </div>
                        <div class="content-third-p">
                            <p>{{ $FirstMission['content'] }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @php $a++; @endphp
                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="our-experts"> --}}
        @php $b=1; @endphp
        @foreach($FirstExpert as $FirstExpert)
        @if($b == 1)
        <div class="container-fluid our-experts pd-l-0 pd-r-0">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-forth-content">
                            <h2>Our Experts</h2>
                            <p>{{ $FirstExpert['content'] }}</p>
                            <p>{{ $FirstExpert['content_2'] }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 pd-r-0 pd-l-0">
                        <div class="about-fourth-image">
                            @php $image = $FirstExpert['pic_name']; @endphp
                            <img src="{{asset("$image")}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container-fluid our-experts-2 pd-l-0 pd-r-0">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 pd-l-0 pd-r-0">
                        <div class="about-fourth-image">
                            @php $image = $FirstExpert['pic_name']; @endphp
                            <img src="{{asset("$image")}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-forth-content next-sec">
                            {{-- <h2>Our Experts</h2> --}}
                            <p>{{ $FirstExpert['content'] }}</p>
                            <p>{{ $FirstExpert['content_2'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @php $b++; @endphp
        @endforeach


        {{-- AboutTeam --}}
        <div class="our-team" id="our_team">
            <div class="container">
                <div class="our-team-header" >
                    <h2>Our <span>Team</span></h2>
                </div>
                <div class="team_section" >
                    <div class="row">
                        @php $t=1; @endphp
                        @foreach($AboutTeam as $AboutTeam)
                
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-6 text-center team_block" >
                                <div class="team_img" >
                                    @php $team_image = $AboutTeam['pic_path']; @endphp
                                    <img src="{{asset("$team_image")}}" />
                                </div>
                                <div class="team_heading text-center" style="">
                                    <p >{{ $AboutTeam['heading'] }}</p>
                                </div>
                                <div class="team_sub_heading text-center" >
                                    <p >{{ $AboutTeam['sub_heading'] }}</p>
                                </div>
                            </div>
                        @php $t++ @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    {{-- </div> --}}
    {{-- <div class="container-fluid about-bg-2">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div> --}}
 

@endsection

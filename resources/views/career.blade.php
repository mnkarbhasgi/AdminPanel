@extends('layouts.app')
@section('title')
<title>Career -  </title>

@endsection

@section('content')

    <div class="blog-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    Career
                </h1>
            </div>
    
        </div>
    </div>

    <div class="container">
        <div class="row text-center">
            @if(Session::has('alert_class'))
                <p class="alert alert-success">{{ Session::get('alert_class') }}</p>
            @endif
            <div class="career " data-wow-duration="1s" data-wow-delay="0.2s">
                <h2>ABOUT <span>COMPANY</span></h2>
            </div>
        </div>
    </div>

    <div class="career-bg">
        <div class="container">
            <div class="row">
                @foreach($CareerFirst as $CareerFirst)
                <div class="col-lg-6 career-left">
                    <div class="career-content">
                        <p>{{ $CareerFirst['content'] }}</p>

                        <p>{{ $CareerFirst['content_2'] }}</p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="career-img">
                        @php $image = $CareerFirst['image_path']; @endphp
                        <img src="{{asset("$image")}}" class="img">
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($CareerSecond as $CareerSecond)
                        <div class="col-lg-4">
                            <div class="career-card">
                                <div class="career-card-img">
                                    @php $image = $CareerSecond['image_path']; @endphp
                                    <img src="{{asset("$image") }}" class="img">
                                </div>
                                <div class="career-card-content">
                                    <h3>{{ $CareerSecond['heading'] }}</h3>
                                    <p>{{ $CareerSecond['content'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="current-opening">
        <div class="container">
            <div class="row text-center">
                <div class="career " data-wow-duration="1s" data-wow-delay="0.2s">
                    <h2>CURRENT <span>OPENINGS</span></h2>
                </div>
            </div>
            <div class="row">
                @foreach($career as $career)
                <div class="col-lg-4">
                    <div class="current-card">
                        <h2>{{ $career['title']}}</h2>
                        <p>Location: {{ $career['location']}}  | Exp: {{ $career['experience']}} yrs</p>
                        <p class="mr-b-20">{{ $career['openings']}} Openings</p>
                        <a href="career_detail/{{ $career['id']}}" >Know More</a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
 
    <div class="container our-blog">
        <div class="our-blog-header " data-wow-duration="1s" data-wow-delay="0.2s">
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

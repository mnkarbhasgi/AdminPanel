@extends('layouts.app')
@section('title')
<title>Case Study -  </title>

@endsection

@section('content')

    <div class="service-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    Case Study
                </h1>
            </div>
    
        </div>
    </div>
    @php $i=1 @endphp
    @foreach($CaseFirst as $CaseFirst)
    @if($i%2 == 1)
    <div class="container-fluid case-study-1">        
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="case-study-contents-left">
                        <h2>{{ $CaseFirst['title'] }}</h2>
                        <p>{{ $CaseFirst['content'] }}</p>
                    </div>
                </div>
                <div class="col-lg-6 pd-r-0 pd-l-0">
                    <div class="case-study-img">
                        @php $file_name = $CaseFirst['pic_name']; @endphp
                        <img src="{{asset("$file_name")}}" />
                    </div>
                </div>

            </div>
        </div>
    </div>
    @else
    <div class="container-fluid case-study-2">        
        <div class="col-lg-12">
            <div class="row">

                <div class="col-lg-6 pd-r-0 pd-l-0">
                    <div class="case-study-img">
                        @php $file_name = $CaseFirst['pic_name']; @endphp
                        <img src="{{asset("$file_name")}}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="case-study-contents-right">
                        <h2>{{ $CaseFirst['title'] }}</h2>
                        <p>{{ $CaseFirst['content'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif 

    @php $i++ @endphp

    @endforeach

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
                        <div class="img-sec wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                            <img class="card-img-top card-img-h" src="{{asset("$file_name")}}" />
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


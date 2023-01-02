@extends('layouts.app')
@section('title')
<title>Services -  </title>

@endsection

@section('content')

    <div class="service-banner">
        <div class="container">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    @foreach($services as $services)
                    {{ $services['title']}}
                    @endforeach
                </h1>
            </div>
    
        </div>
    </div>
 
    <div class="container blog-service">
        <div class="row">
            @foreach($ServiceDetails as $ServiceDetails)
            <div class="col-lg-4">
                <div class="service-card">
                    <div class="card">
                        @php $img = $ServiceDetails['image_path']; @endphp
                        <img class="card-img-top" src="{{ asset("$img") }}" alt="Card image cap">
                        <div class="card-body card-body-min-h">
                        <h5 class="card-title">{{ $ServiceDetails['title'] }}</h5>
                        <p class="card-text">{!! $ServiceDetails['content'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
                        <div class="img-sec wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                            <img class="card-img-top card-img-h" src="{{ asset("$file_name") }}" />
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


@endsection

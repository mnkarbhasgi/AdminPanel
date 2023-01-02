@extends('layouts.app')
@section('title')
<title>Services -  </title>

@endsection

@section('content')

    <div class="service-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    All Services
                </h1>
            </div>
    
        </div>
    </div>
 
    <div class="container blog-service">
        <div class="row">
            @foreach($services as $services)
            <div class="col-lg-4">
                <div class="service-card">
                    <a href="servicesdetail/{{ $services['id'] }}" >
                        <div class="card">
                            @php $imgname = $services['featured_image_path']; @endphp
                            <img class="card-img-top" src="{{ asset("$imgname") }}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">{{ $services['title'] }}</h5>
                            <p class="card-text">{{ $services['featured_content'] }}</p>
                            </div>
                        </div>
                    </a>
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


@endsection

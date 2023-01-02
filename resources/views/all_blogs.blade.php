@extends('layouts.app')
@section('title')
<title>Blogs</title>

@endsection

@section('content')

    <div class="blog-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    Blogs
                </h1>
            </div>
    
        </div>
    </div>
 
    <div class="container blog-service">
        <div class="row">
            {{-- @foreach($blog as $blogs)
            <div class="col-lg-4 blog-sec">
                @php $file_name = $blogs['featured_image_name']; @endphp
                <div class="img-sec wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <img src="{{asset("storage/featured_image/$file_name")}}" />
                </div>
                <h2>{{$blogs['title']}}</h2>
                <p>{{$blogs['featured_content']}}</p>
                @php $blog = $blogs['id']; @endphp
                <a href="{{ url('blog_details/'.$blog) }}">Know More</a>
            </div>
            @endforeach --}}
            @foreach($blog as $blogs)
            <div class="col-lg-4">
                <div class="service-card">
                    <div class="card">
                        @php $file_name = $blogs['featured_image_path']; @endphp
                        <img class="card-img-top card-img-h" src="{{ asset("$file_name") }}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{$blogs['title']}}</h5>
                        @php $truncated = Str::limit($blogs['featured_content'], 185, '...'); @endphp
                        <p>{{ $truncated }} </p>
                        @php $blog = $blogs['id']; @endphp
                        <a href="{{ url('blog_details/'.$blog) }}">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>



@endsection

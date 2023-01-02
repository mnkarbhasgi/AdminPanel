@extends('layouts.app')
@section('title')
<title>Blogs</title>

@endsection

@section('content')

    <div class="blog-banner">
        <div class="container-fluid">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    Blog Details
                </h1>
            </div>
    
        </div>
    </div>

 
    <div class="container our-blog">
        <div class="row">
            @foreach( $blog1 as $blogs1 )
            <div class="col-lg-8">
                <div class="blog-img-sec">
                    @php $file_name = $blogs1['featured_image_path']; @endphp
                    <img src="{{ asset("$file_name") }}" />
                </div>
                <div class="blog-heading-sec">
                    <h2>{{$blogs1['title']}}</h2>
                    <p><span>By {{ $blogs1['author'] }} </span> <span class="second-span"> {{ date('d/m/Y', strtotime($blogs1['created_at'] )) }}</span></p>

                    <p>
                        {!! $blogs1['main_blog'] !!}
                    </p>
                </div>
            </div>
            @endforeach




            <div class="col-lg-4">
                <div class="col-lg-12 lastest-post">
                    <div class="latest-heading">
                        <h2>Latest Post</h2>
                    </div>
                    <div class="blog-list">
                        @foreach( $blog as $blogs )
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-4 col-lg-4 latest-img">
                                    @php $file_name = $blogs['featured_image_path']; @endphp
                                    <img class="latest-post-img-h" src="{{ asset("$file_name") }}" />
                                    {{-- <img src="{{ ('../assets/images/latest1.png') }}" /> --}}
                                </div>
                                <div class="col-8 col-lg-8 latest-contents">
                                    <div class="latest-content-heading">
                                        @php $blog_id = $blogs['id']; @endphp
                                        <h5><a href="{{ url('blog_details/'.$blog_id) }}">{{$blogs['title']}}</a></h5>
                                    </div>
                                    <div class="latest-content-names">
                                        <p><span>By {{ $blogs['author'] }} </span> <span class="second-span"> {{ date('d-m-Y', strtotime($blogs['created_at'] )) }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-12 lastest-post">
                    <div class="latest-heading">
                        <h2>Categories</h2>
                    </div>
                    <div class="blog-list">
                        <div class="col-lg-12">
                            <ul class="blog-heading-list">
                                <li><h2>Software Development <span>({{ $cat1 }})</span></h2></li>
                                <li><h2>Website Development<span>({{ $cat2 }})</span></h2></li>
                                <li><h2>Artificial Intelligence<span>({{ $cat3 }})</span></h2></li>
                                <li><h2>Information Security<span>({{ $cat4 }})</span></h2></li>
                                <li><h2>UI/UX<span>({{ $cat5 }})</span></h2></li>
                                <li><h2>Big Data & predictive Analysis<span>({{ $cat6 }})</span></h2></li>
                                <li><h2>Software & Hitech<span>({{ $cat7 }})</span></h2></li>
                                <li><h2>Tele communication<span>({{ $cat8 }})</span></h2></li>
                                <li><h2>Automotive<span>({{ $cat9 }})</span></h2></li>
                                <li><h2>Banking & Finance<span>({{ $cat10 }})</span></h2></li>
                                <li><h2>Agriculture<span>({{ $cat11 }})</span></h2></li>
                                <li><h2>E business & Retail<span>({{ $cat12 }})</span></h2></li>
                                <li><h2>Education<span>({{ $cat13 }})</span></h2></li>
                                <li><h2>Health Care<span>({{ $cat14 }})</span></h2></li>
                                <li><h2>Logistics<span>({{ $cat15 }})</span></h2></li>
                            </ul>
                        </div>
                    </div>
                </div>
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

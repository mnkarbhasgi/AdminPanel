@extends('layouts.app')
@section('title')
<title>Industries -  </title>

@endsection

@section('content')

    <div class="blog-banner">
        <div class="container">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-xs-12 service-heading">
                <h1>
                    @foreach($industries as $industries)
                    {{ $industries['title']}}
                    @endforeach
                </h1>
            </div>
    
        </div>
    </div>

    

    @foreach($IndustryFirst as $IndustryFirst)
    <div class="case-study">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-7">
                        <div class="case-contents">
                            <h2>{{ $IndustryFirst['title'] }}</h2>
                            <p>{{ $IndustryFirst['content'] }}</p>
                            <p>{{ $IndustryFirst['content_2'] }} </p>
                            <p>{{ $IndustryFirst['content_3'] }}</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="case-img-new">
                            @php $img = $IndustryFirst['image_path']; @endphp
                            <img src="{{ asset("$img") }}"  class="img"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="case-study">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-img">
                        @php $img = $IndustryFirst['image_path']; @endphp
                        <img src="{{ asset("$img") }}"  class="img"/>
                    </div>
                    <div class="case-contents">
                        <h2>{{ $IndustryFirst['title'] }}</h2>
                        <p>{{ $IndustryFirst['content'] }}</p>
                        <p>{{ $IndustryFirst['content_2'] }} </p>
                        <p>{{ $IndustryFirst['content_3'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @endforeach

    @foreach($IndustrySecond as $IndustrySecond)
    <div class="case-study-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="case-2-image">
                        @php $img = $IndustrySecond['image_path']; @endphp
                        <img src="{{ asset("$img") }}"/>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="case-2-contents">
                        <ul>
                            <li><p>{{ $IndustrySecond['content'] }}</p></li>
                            <li><p>{{ $IndustrySecond['content_2'] }}</p></li>
                            <li><p>{{ $IndustrySecond['content_3'] }}</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
    @php $i=1; @endphp
    @foreach($IndustryDetails as $IndustryDetails)
        @if($i%2 == 1)
            <div class="case-study">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="case-img">
                                @php $img = $IndustryDetails['image_path']; @endphp
                                <img src="{{ asset("$img") }}"  class="img"/>
                            </div>
                            <div class="case-contents">
                                <h2>{{ $IndustryDetails['title'] }}</h2>
                                <p>{{ $IndustryDetails['content'] }}</p>                            
                                <p>{{ $IndustryDetails['content_2'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="case-study-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="case-2-image">
                                @php $img = $IndustryDetails['image_path']; @endphp
                                <img src="{{ asset("$img") }}" class="img"/>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="case-3-contents">
                                <h2>{{ $IndustryDetails['title'] }}</h2>
                                <p>{{ $IndustryDetails['content'] }}</p> 
                                <p>{{ $IndustryDetails['content_2'] }}</p>
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

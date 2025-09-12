@extends('web.utils.master')
@section('content')
@section('head')
<title>PortaCourts Blog</title>
<link rel="canonical" href="https://portacourts.com/blog" />
<meta name="description" content="Welcome to the PortaCourts Blog! Here, we bring you the latest insights, tips, and news about sports courts and their impact on athletes and communities.">
@endsection
<section class="blog-wrapper pt-70 pb-5 ">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-lg-7">
                <div class="banner-text">
                    <h1 class="font-oswald fw-600 text-uppercase"><span class="color-change primary-theme">B</span>log</h1>
                    <p class="text-white">Welcome to the PortaCourts Blog! Here, we bring you the latest insights, tips, and news about sports courts and their impact on athletes and communities. Whether you're a seasoned sports enthusiast, a coach, or just someone who loves staying active, our blog is your go-to resource for everything related to sports courts.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
                <h2 class="text-capitalize">Blog</h2>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($post as $singlepost)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 pb-5 pb-xl-0">
                <div class="stay-blog">
                    <div class="blog-img ">
                        <img src="{{ asset('storage/' . $singlepost->image_url) }}" class="img-fluid">
                    </div>
                    <div class="stay-blog-details bg-white">
                        <div class="inner-blog-detail ">
                            <p class="f18 fw-400 mb-1 d-flex align-items-center gap-2"><img src="{{url('/')}}/webassets/img/calender.svg">{{date('M d, Y',strtotime($singlepost->created_at))}}
                            </p>
                            <h4 class="one-line textcolor">{{$singlepost->title}}
                            </h4>
                            <span class="four-line mb-4 padding-blog"><?php echo $singlepost->description; ?>,</span>
                            <a class="black-btn " href="{{route('blogDetail',$singlepost->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@extends('web.utils.master')
@section('content')
@section('head')
<title>PortaCourts Blog</title>
<link rel="canonical" href="https://www.portacourts.com/blog" />
<meta name="description" content="Welcome to the PortaCourts Blog! Here, we bring you the latest insights, tips, and news about sports courts and their impact on athletes and communities.">
<script type="application/ld+json">
[
  {
	"@context": "https://schema.org",
	"@type": "WebPage",
	"name": "Porta Courts Blog",
	"url": "https://www.portacourts.com/blog",
	"description": "Stay updated with expert insights, tips, and news on Pickleball and Spikeball courts from Porta Courts.",
	"isPartOf": {
  	"@type": "WebSite",
  	"name": "Porta Courts",
  	"url": "https://www.portacourts.com/"
	},
	"breadcrumb": {
  	"@type": "BreadcrumbList",
  	"itemListElement": [
    	{
      	"@type": "ListItem",
      	"position": 1,
      	"name": "Home",
      	"item": "https://www.portacourts.com/"
    	},
    	{
      	"@type": "ListItem",
      	"position": 2,
      	"name": "Blog",
      	"item": "https://www.portacourts.com/blog"
    	}
  	]
	}
  },
  {
	"@context": "https://schema.org",
	"@type": "Blog",
	"name": "Porta Courts Blog",
	"url": "https://www.portacourts.com/blog",
	"description": "Explore expert tips, industry trends, and updates on portable Pickleball and Spikeball courts.",
	"publisher": {
  	"@type": "Organization",
  	"name": "Porta Courts",
  	"url": "https://www.portacourts.com/",
  	"logo": {
    	"@type": "ImageObject",
    	"url": "https://www.portacourts.com/webassets/img/logo.svg",
    	"width": 600,
    	"height": 60
  	},
  	"sameAs": [
  	"https://www.facebook.com/portacourts",
  	"https://www.instagram.com/portacourts",
  	"https://x.com/portacourts"
	]
	}
  }
]
</script>
@endsection
<!-- <section class="py-5">
    <div class="container">
        <div class="carousel-blog">
            <div class="contain">
                <div id="blog-carousel" class="owl-carousel owl-theme">
                @foreach($first3post as $singlepost)
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-5 mb-4 mb-lg-0">
                                <div class="image-carousel">
                                    <img src="{{ asset('storage/' . $singlepost->image_url) }}">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="text-carousel">
                                    <div class="post-meta mb-3">
                                        <span class="f16 black-grey fw-500">Created</span>
                                        <span class="f14 text-grey">- {{date('M d, Y',strtotime($singlepost->created_at))}}</span>
                                    </div>
                                    <h2 class="black-grey pb-3">
                                    {{$singlepost->title}}</h2>
                                    <span class="four-line mb-4 padding-blog"><?php echo $singlepost->description; ?></span>
                                    <div class="post-author d-flex align-items-center gap-2">
                                        <div class="author-pic">
                                            <img src="{{asset('/dummy.png')}}" alt="Image">
                                        </div>
                                        <div class="text">
                                            <p class="f20 black-grey fw-600 pb-0 lh-sm mb-0">{{$singlepost->author}}</p>
                                            <p class="text-grey mb-0 ">CEO and Founder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="py-5">
    <div class="container">
    <div class="text-center mb-5">
                <h1 class="mb-1">Porta Courts Blogs</h1>
                <p class="mb-5 f18 text-grey">Stay updated with the latest trend!</p>
            </div>
        <div class="row">
        @foreach($first3post as $singlepost)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <a class="blog-grid d-block" href="{{route('blogDetail',$singlepost->slug)}}" target="_blank">
                    <div class="">
                        <img src="{{ asset('storage/' . $singlepost->image_url) }}" class="img-fluid mb-3 blog-grid-image">
                    </div>
                    <div class="text-carousel">
                        <div class="post-meta pb-3">
                            <span class="f16 black-grey fw-500">Created</span>
                            <span class="f14 text-grey">- {{date('M d, Y',strtotime($singlepost->created_at))}}</span>
                        </div>
                        <h4 class="black-grey pb-3 mb-0 oneline-blog"> {{$singlepost->title}}</h4>
                        <!-- <p class="text-grey lh-base three-line"></p> -->
                        <div class="four-line mb-4 padding-blog text-grey fw-400">
                      <p class="text-grey fw-400">  <?php echo htmlspecialchars(strip_tags($singlepost->description)); ?></p>
                    </div>
                        <div class="post-author d-flex align-items-center gap-2">
                            <div class="author-pic">
                                <img src="{{asset('/dummy.png')}}" alt="Image">
                            </div>
                            <div class="text">
                                <p class="f20 black-grey fw-600 pb-0 lh-sm mb-0">{{$singlepost->author}}</p>
                                <p class="text-grey mb-0 ">CEO and Founder</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach 
        </div>
    </div>
</section>
{{-- 
<section class="pb-5">
    <div class="container">
        <div class="row">
            <div class="text-center mb-5">
                <h2>Most Popular Posts</h2>
            </div>
            <div class="hash-carousel">
                <div id="carousel-hash" class="owl-carousel owl-theme">
                @foreach($post as $singlepost)
                    <div class="item">
                        <a class="blog-grid d-block" href="{{route('blogDetail',$singlepost->slug)}}" target="_blank">
                            <div class="">
                                <img src="{{ asset('storage/' . $singlepost->image_url) }}" class="img-fluid mb-3 blog-grid-image">
                            </div>
                            <div class="text-carousel">
                                <div class="post-meta pb-3">
                                    <span class="f16 black-grey fw-500">Created</span>
                                    <span class="f14 text-grey">- {{date('M d, Y',strtotime($singlepost->created_at))}}</span>
                                </div>
                                <h4 class="black-grey pb-3 mb-0 oneline-blog">{{$singlepost->title}}</h4>
                                <!-- <p class="text-grey lh-base three-line"></p> -->
                                <div class="four-line mb-4 padding-blog text-grey fw-400">
                                <p class="text-grey fw-400">  <?php echo htmlspecialchars(strip_tags($singlepost->description)); ?></p>
                                </div>
                                <div class="post-author d-flex align-items-center gap-2">
                                    <div class="author-pic">
                                        <img src="{{asset('/dummy.png')}}" alt="Image">
                                    </div>
                                    <div class="text">
                                        <p class="f20 black-grey fw-600 pb-0 lh-sm mb-0">{{$singlepost->author}}</p>
                                        <p class="text-grey mb-0 ">CEO and Founder</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach 
                </div>
            </div>
        </div>
    </div>
</section>
--}}
<section class="py-5">
    <div class="container">
        <div class="row">
        @foreach($post as $singlepost)
            <div class="col-lg-6 mt-4 mt-lg-0 ">
                <div class="sports">                    
                    <div class="mb-4">
                        <a class="d-md-flex gap-3 align-items-center" href="{{route('blogDetail',$singlepost->slug)}}" target="_blank">
                            <div class="listimage-blog">
                                <img src="{{ asset('storage/' . $singlepost->image_url) }}" class="listblog-image">
                            </div>
                            <div class="text-carousel mt-3 mt-md-0">
                                <div class="post-meta pb-2">
                                    <span class="f16 black-grey fw-500">Created</span>
                                    <span class="f14 text-grey">- {{date('M d, Y',strtotime($singlepost->created_at))}}</span>
                                </div>
                                <h4 class="black-grey pb-3 mb-0 blogone f18">{{$singlepost->title}}</h4>
                                <div class="post-author d-flex align-items-center gap-2 mt-2">
                                    <div class="author-pic">
                                        <img src="{{asset('/dummy.png')}}" alt="Image">
                                    </div>
                                    <div class="text">
                                        <p class="f20 black-grey fw-600 pb-0 lh-sm mb-0">{{$singlepost->author}}</p>
                                        <p class="text-grey mb-0 ">CEO and Founder</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- <div class="pb-5 text-center d-flex justify-content-center mx-auto">
      <a href="{{route('allblog')}}" class="black-btn " style="padding:13px 53px;">See All</a>
</div> -->
<div class="pb-5 text-center d-flex justify-content-center mx-auto">
{{ $post->links('pagination::bootstrap-4') }}
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
    $('#blog-carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        nav: false,
        items: 1,
    })
    $('#carousel-hash').owlCarousel({

        loop: true,
        margin: 30,
        dots: false,
        nav: true,
        items: 1,
        responsive: {
            0: {
                items: 1,

            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
</script>
@endsection
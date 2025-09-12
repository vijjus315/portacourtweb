@extends('web.utils.master')
@section('content')
<section class="py-5">
    <div class="container">
        <!-- <div class="text-center mb-5">
            <h1 class="mb-1">Porta Courts Blogs</h1>
            <p class="mb-5 f18 text-grey">Stay updated with the latest trend!</p>
        </div> -->
        <div class="row">
            @foreach($first3post as $singlepost)
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4 ">
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
                            <p class="text-grey fw-400"> <?php echo htmlspecialchars(strip_tags($singlepost->description)); ?></p>
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
@endsection
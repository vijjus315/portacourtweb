@php
$post = App\Models\Post::where('status',1)->orderby('id', 'desc')->limit(3)->get();
@endphp
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="text-center">
                    <h2 class="head-color ">Stay Tuned for Updates</h2>
                    <p>Don’t miss out on the latest news, innovations, and exclusive offers from PortaCourts. Stay tuned for updates and be the first to know about our new products and exciting developments! </p>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            @foreach($post as $singlepost)
            <div class="col-lg-4 pb-5 pb-lg-0">
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
                            <span class=" four-line mb-4 padding-blog "><?php echo $singlepost->description; ?>,</span>
                            <a class="black-btn " href="{{route('blogDetail',$singlepost->slug)}}">Read More</a >
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
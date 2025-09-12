@php
$testimonail = App\Models\Testimonail::where('status',1)->orderby('id', 'desc')->get();
@endphp
<section class="testimonials-wrapper py-5">
    <div class="conatiner">
        <div class="row">
            <div class="col-12 col-sm-9 col-lg-8 mx-auto">
                <div class="contain">
                    <div id="owl-carousel" class="owl-carousel owl-theme owl-testimonial">
                        @foreach($testimonail as $singleData)
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="testimonial-image position-relative">
                                        <img src="{{ asset('storage/' . $singleData->image_url) }}" class="img-fluid">
                                        <div class="name-testi">
                                            <img src="{{url('/')}}/webassets/img/ellipse.svg" class="img-fluid">
                                            <h6 class="text-center black-grey">{{$singleData->name}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="testimonials-text ps-md-4">
                                        <h2 class="text-white">{{$singleData->designation}} <br>
                                           
                                        </h2>
                                        <p class="text-white "><?php echo $singleData->description; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
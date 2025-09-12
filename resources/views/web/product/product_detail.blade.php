@extends('web.utils.master')
@section('content')
@section('head')
@php
    $title = '';
    $metadesc = '';
    if($product->id == 10){
        $title = 'Shop Pickleball Court';
        $metadesc = 'Check out our professional-grade custom Pickleball courts, designed to achieve precision for optimal traction and ball response. Shop from PortaCourts today!';
    }else{
        $title = 'Shop Spike Ball Court';
        $metadesc = 'Shop premium Spikeball courts at PortaCourts – durable and portable with easy installation. Built for intense training sessions and matches in any weather conditions.';
    }
@endphp
<title>{{$title}} | PortaCourts</title>
<meta name="description" content="{{$metadesc}}">
<link rel="canonical" href="https://www.portacourts.com/product-detail/{{ Request::segment(2) }}"/>
<link rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css">
@endsection
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div class="slider">
                    <div class="slider__flex">
                        <div class="slider__col">
                            <!-- <div class="slider__prev">Prev</div> -->
                            <div class="slider__thumbs">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper thumbnail-slider">
                                        @foreach($product->product_images as $singleimage)
                                        <div class="swiper-slide">
                                            <div class="slider__image"><img src="{{ asset('storage/' . $singleimage->image_url) }}" alt="" />
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="slider__next">Next</div>  -->
                        </div>
                        <div class="slider__images">
                            <div class="swiper-container">
                                @foreach($product->product_images as $singleimage)
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider__image"><img src="{{ asset('storage/' . $singleimage->image_url) }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="product-slider-detail">
                    <h2 class="fw-400   mb-3  product-name d-flex align-items-start gap-2">
                        {{$product->title}}
                    </h2>
                    @if(count($product->variants) > 1)
                    <h2 class="productvariant mb-3">(Price Includes 1 Net, 4 Paddles and 20 Pickleballs)
                        @endif
                    </h2>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="rating-product">
                            @php
                            $averageRating = $product->average_rating;
                            $fullStars = floor($averageRating);
                            $halfStar = ($averageRating - $fullStars) >= 0.5 ? 1 : 0;
                            $emptyStars = 5 - $fullStars - $halfStar;
                            @endphp
                            @for ($i = 0; $i < $fullStars; $i++) <img src="{{url('/')}}/webassets/img/yellow-star.svg">
                                @endfor

                                @if ($halfStar)
                                <img src="{{url('/')}}/webassets/img/half-star.svg">
                                @endif

                                @for ($i = 0; $i < $emptyStars; $i++) <img src="{{url('/')}}/webassets/img/grey-star.svg">
                                    @endfor
                        </div>
                        <!-- <span class="mb-0 lh-0 black-grey fw-400">15 Reviews</span> -->
                    </div>
                    <hr>
                    <h6 class="mb-2 fw-700 f20 ">Size</h6>
                    <!-- <div class="{{count($product->variants) == 1 ? 'variant-select-not' : 'variant-width'}}"> -->
                    <div class="variant-select-not">
                        <div class="variant-box position-relative">
                            <div class="variant-data">
                                {{ $item->length }} ft X {{ $item->width }} ft X {{ $item->thickness }} mm
                            </div>
                            <!-- <div class="arrow-icon-vari">
                                @if(count($product->variants) > 1)
                                <p class="mb-0 " id="selectsize"> Select Size</p>
                                @endif
                            </div> -->
                        </div>
                        <ul class="select-size ps-0 py-2" id="variant-select" style="display: none;">
                            @foreach($product->variants as $variant)
                            <li class="{{$item->id == $variant->id ? 'active' : ''}}" data-vid="{{ $variant->id }}" data-price="{{ $variant->price }}" data-discount="{{ $variant->discount }}" style="cursor:pointer">
                                {{ $variant->length }} ft X {{ $variant->width }} ft X {{ $variant->thickness }} mm
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                        <h1 class=" mb-0 product-price sky-blue-text fw-500">
                            ${{$item->discounted_price ?? ''}}.<span class="f18-size">00</span>
                        </h1>
                        <h3 class="mb-0 price-strike fw-400 font-Yantramanav">${{$item->price ?? ''}}.00</h3>
                        <p class="green-btn mb-0 savepro-btn fw-400">Save {{$item->discount ?? ''}}%</p>
                        <p class="productvariant mb-3"><b>Shipping:</b></br> Flat fee of $350 within the U.S.<br> International shipping available (email for quote).<br><b>Pre-Order Offer:</b><br>✅ 10% OFF on Pre-Orders<br>📦 Expected Delivery: Early October 2025 or earlier</p>
                        <!-- <p class="productvariant mb-3">International shipping available (email for quote).</p>
                        <p class="productvariant mb-3">Pre-Order Offer:</p>
                        <p class="productvariant mb-3">✅ 10% OFF on Pre-Orders</p>
                        <p class="productvariant mb-3">📦 Expected Delivery: Early October 2025 or earlier</p> -->

                    </div>
                    <hr>
                    <h6 class="mb-2 fw-700 f20 ">Category</h6>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <p class="fw-400 f20 mb-0">
                            {{$product->category->title}}
                        </p>
                    </div>
                    <h6 class="mb-3 fw-700 f20 ">Quantity</h6>
                    <div class="mt-3 mb-4 d-flex align-items-center gap-2">
                        <span class="minus-pro"><i class="fa fa-minus" aria-hidden="true"></i>
                        </span>
                        <span class="num"></span>
                        <span class="plus-pro"><i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                    </div>
                    @if($item->quantity == 0)
                    <a class="text-danger out-btn font-Yantramanav  mb-3"><img src="{{url('/')}}/webassets/img/outofstock.svg" class="me-2">Out of
                        Stock</a>
                    @endif
                    <div class=" gap-5 quantity-wrapper py-4">
                        <div class="mt-3 mt-sm-0 edit-wrapper  d-block align-items-center  d-sm-flex gap-4">
                            @if($item->quantity == 0)
                            <!-- <button class="green-btn f16 mb-3 mb-sm-0 " type="button " data-bs-toggle="modal" data-bs-target="#requestcallbtn">Request for Quote</button> -->
                            <button class="green-btn f16 btn-disabled " type="button ">Buy Now</button>
                            <!-- <button class="blue-btn f16  btn-disabled" type="button">Add to Cart</button> -->
                            @else
                            <!-- <button class="green-btn f16 mb-3 mb-sm-0 " type="button " data-bs-toggle="modal" data-bs-target="#requestcallbtn">Request for Quote</button> -->
                            <button class="green-btn f16 " type="button " data-bs-toggle="modal" data-bs-target="#requestcustomsizebtn" >Request Custom Court</button>
                            <button class="green-btn f16 add-to-buy-btn" data-product-id="{{ $product->id }}" data-variant-id="{{ $item->id }}" data-quantity="1" type="button ">Buy Now</button>
                            <!-- <button class="blue-btn f16 add-to-cart-btn" type="button" data-product-id="{{ $product->id }}" data-variant-id="{{ $item->id }}" data-quantity="1">Add to Cart</button> -->
                            @endif
                            @php
                            $in_wishlist = App\Models\Wishlist::where(['user_id'=> Auth::id(),'product_id'=>$product->id])->first();
                            @endphp
                            <a class=" addwishlist topwish-list" data-product-id="{{ $product->id }}" data-in-wishlist="{{ $in_wishlist ?? '' }}">
                                <img src="{{ $in_wishlist ? url('/') . '/webassets/img/green-wishlist-bg.svg' : url('/') . '/webassets/img/unfillwishlist.svg' }}" class="wishlist-icon">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">

                <div class="description-product">
                    <nav>
                        <div class="nav nav-tabs mb-3 border-0" id="nav-tab" role="tablist">
                            <button class="font-oswald fw-500  bg-transparent nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">
                                <h3>Description</h3>
                            </button>
                            <button class="font-oswald fw-500  bg-transparent nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">
                                <h3>Reviews</h3>
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content " id="nav-tabContent">
                        <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab">


                            <div class="row">
                                <div class="{{!!$product->video ? 'col-lg-7' : 'col-lg-12' }} ">
                                    <p class="fw-400 f16 font-Yantramanav lh-lg"><?php echo $product->description; ?>
                                    </p>
                                </div>
                                @if(!!$product->video)
                                <div class="col-lg-5 mt-3 mt-lg-0">
                                    <div class="play-video-icon position-relative">
                                        <video id="productVideo" height="365" controls style="width:100%;">
                                            <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4" >
                                            Your browser does not support the video tag.
                                        </video>
                                        <!-- <div class="play-icon" id="playPauseIcons">
                                            <i class="fa fa-play" aria-hidden="true" id="playIcon"></i>
                                            <i class="fa fa-pause" aria-hidden="true" id="pauseIcon" style="display:none;"></i>
                                        </div> -->
                                    </div>
                                </div>

                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="row  mt-4 mb-5">
                                <div class="col-12 col-lg-6 p-3">
                                    <div class="row pb-3 pb-md-4 pt-md-0 align-items-center comment-text">
                                        <div class="col-md-6">
                                            <h5 class="mb-0 fw-500 f18">All Reviews ({{count($allreview)}})</h5>
                                        </div>
                                        <div class="col-md-6 pt-3 pt-md-0">
                                            <div class="sort-drop text-end gap-2">
                                                <p class="sort-text  mb-0">Sort by :</p>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle drop-btn-sort fw-500  border-0" type="button" id="newest-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{$filter == 'oldest' ? 'Oldest' : 'Newest'}}
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="newest-dropdown">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('product_detail', ['slug' => $product->slug, 'filter' => 'newest']) }}">
                                                                Newest
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('product_detail', ['slug' => $product->slug, 'filter' => 'oldest']) }}">
                                                                Oldest
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($allreview as $singlereview)
                                    <div class="comment-section">
                                        <div class="comment-inner-box">
                                            <div>
                                                <img src="{{ $singlereview->user->profile ? asset('storage/' . $singlereview->user->profile) : asset('/dummy.png') }}" alt="User Profile" class="profile-comment">
                                            </div>
                                            <div class="d-flex justify-content-between  w-100">
                                                <div class="profile-name-comment">
                                                    <p class="f16 fw-500 text-black mb-0 lh-0  ">{{$singlereview->user->name}}</p>
                                                    <p class="mb-0 fw-400 lh-0 mt-4">{{date('M, d Y',strtotime($singlereview->created_at))}}</p>
                                                    <div class="star-comment mt-2 ">
                                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$singlereview->rating)
                                                            <img src="{{url('/')}}/webassets/img/yellow-star.svg" class="">
                                                            @else
                                                            <img src="{{url('/')}}/webassets/img/grey-star.svg" class="">
                                                            @endif
                                                            @endfor

                                                    </div>
                                                </div>
                                                <div class="edit-drop-review">
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <img src="{{url('/')}}/webassets/img/hori-dots.svg">
                                                        </button>
                                                        @if(Auth::id() == $singlereview->user_id) 
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="{{route('removedRating',$singlereview->id)}}" onclick="return confirm('Are you sure you want to delete this review?');">Delete</a></li>
                                                        </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-0 fw-400 text-black  pt-2 pt-sm-3 line-24 f16 description-div3">
                                            {{$singlereview->comment}}
                                            <!-- <span class="text-end py-2"><a class="f16 fw-500 lowercase read-more-btn3">read more</a></span> -->
                                        </p>

                                        <hr>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="col-12 col-lg-6 p-3">
                                    <div class="review-user">
                                        <div class=" mt-2">
                                            <div class="px-4">
                                                <div class="mb-3 position-relative">
                                                    <label class="fw-500 mb-2">Ratings</label>

                                                    <div class="d-flex justify-content-start gap-3 align-items-center">
                                                        <i class="cus-star-icon unfillstar fa fa-star" data-value="1" aria-hidden="true"></i>
                                                        <i class="cus-star-icon unfillstar fa fa-star" data-value="2" aria-hidden="true"></i>
                                                        <i class="cus-star-icon unfillstar fa fa-star" data-value="3" aria-hidden="true"></i>
                                                        <i class="cus-star-icon unfillstar fa fa-star" data-value="4" aria-hidden="true"></i>
                                                        <i class="cus-star-icon unfillstar fa fa-star" data-value="5" aria-hidden="true"></i>
                                                    </div>
                                                    <input type="hidden" id="rating" name="rating" value="0">
                                                    <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                                </div>
                                                <div class="mb-4 position-relative">
                                                    <label class="fw-500 mb-2">Your review</label>
                                                    <textarea id="comment" class="form-control delivary-input pwd-field pe-5 bg-white border-0 resize-none" placeholder="Write your review" rows="8"></textarea>
                                                </div>
                                                @if(!$review)
                                                <button type="button" id="submitReview" class="btn green-btn w-100 mt-2">Submit Review</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="thankyou" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-width">
                <div class="modal-header border-0">
                    <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{url('/')}}/webassets/img/cross.svg">
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div class="text-center">
                        <img src="{{url('/')}}/webassets/img/thanku.png" class="img-fluid pb-3">
                        <h1 class="font-oswald pb-1">Thank You!</h1>
                        <p class="thank-text fw-500 f20">Your review is successfully added</p>
                    </div>
                    <div class="pt-4 pb-3">
                        <a href="{{route('product_detail',$product->slug)}}" class="btn green-btn w-100 box-shadow">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- request call button modal -->
    <div class="modal fade" id="requestcallbtn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-width">
                <div class="modal-header border-0">
                    <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{url('/')}}/webassets/img/cross.svg">
                    </button>
                </div>
                <div class="modal-body pt-0">
                <form id="contactForm">
                @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">First Name</label>
                                <input type="text" name="first_name" placeholder="Enter here" class="contact-input form-control">
                                <span class="text-danger error-message" id="error-first_name"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Your Subjects</label>
                                <input type="text" name="subjects" placeholder="Enter here" class="contact-input form-control">
                                <span class="text-danger error-message" id="error-subjects"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Email</label>
                                <input type="text" name="email" placeholder="Enter here" class="contact-input form-control">
                                <span class="text-danger error-message" id="error-email"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Phone Number</label>
                                <input type="text" name="phone" placeholder="Enter here" class="contact-input form-control">
                                <span class="text-danger error-message" id="error-phone"></span>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Your message</label>
                                <textarea name="message" placeholder="Enter here" class="contact-input form-control"></textarea>
                                <span class="text-danger error-message" id="error-message"></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="green-btn">Send Message</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
@section('scripts')
<script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script>
<script>
    const sliderThumbs = new Swiper(".slider__thumbs .swiper-container", {

        direction: "vertical",
        slidesPerView: 4,
        spaceBetween: 24,
        mousewheel: true,
        navigation: {
            nextEl: ".slider__next",
            prevEl: ".slider__prev"
        },
        freeMode: true,
        breakpoints: {

            0: {

                direction: "vertical"
            },
            768: {

                direction: "vertical"
            }
        }
    });
    const sliderImages = new Swiper(".slider__images .swiper-container", {

        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: false,
        navigation: {
            nextEl: ".slider__next",
            prevEl: ".slider__prev"
        },
        grabCursor: true,
        thumbs: {

            swiper: sliderThumbs
        },
        breakpoints: {

            0: {

                direction: "vertical"
            },
            768: {

                direction: "vertical"
            }
        }
    });
    const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num");

    window.addEventListener("load", () => {
        if (localStorage["num"]) {
            num.innerText = localStorage.getItem("num");
        } else {
            let a = "01";
            num.innerText = a;
        }
    });

    plus.addEventListener("click", () => {
        a = num.innerText;
        a++;
        a = a < 10 ? "0" + a : a;
        localStorage.setItem("num", a);
        num.innerText = localStorage.getItem("num");
    });

    minus.addEventListener("click", () => {
        a = num.innerText;
        if (a > 1) {
            a--;
            a = a < 20 ? "0" + a : a;
            localStorage.setItem("num", a);
            num.innerText = localStorage.getItem("num");
        }
    });
</script>
<script>
    $(document).ready(function() {
        var isAuthenticated = "{{ Auth::User() ? '1' : '0' }}";

        // Star rating click handler
        $('.cus-star-icon').on('click', function() {
            var rating = $(this).data('value');
            $('#rating').val(rating);

            // Reset all stars
            $('.cus-star-icon').removeClass('checked');

            // Highlight selected stars
            $('.cus-star-icon').each(function(index, star) {
                if (index < rating) {
                    $(star).addClass('checked');
                }
            });
        });

        // Submit review click handler
        $('#submitReview').on('click', function() {
            if (isAuthenticated === '0') {
                toastr.error('Please log in first.');
                return;
            }

            var rating = $('#rating').val();
            var review = $('#comment').val();
            var product_id = $('#product_id').val();
            // Validation
            if (rating == 0) {
                toastr.error('Please select a rating.');
                return;
            }
            if (review.trim() === '') {
                toastr.error('Please write your review.');
                return;
            }

            $.ajax({
                url: '{{ route("submit.review") }}', // Replace with your route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rating: rating,
                    review: review,
                    product_id: product_id
                },
                success: function(response) {
                    if (response.success) {
                        // toastr.success('Review submitted successfully');
                        // Reset form
                        $('#rating').val(0);
                        $('#comment').val('');
                        $('.cus-star-icon').removeClass('checked');
                        $('#thankyou').modal('show');
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                },
                error: function() {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Add to cart
        $('.add-to-buy-btn').on('click', function(e) {
            e.preventDefault();

            const product_id = $(this).data('product-id');
            const quantity = $(this).data('quantity') || 1;
            const variant_id = $(this).data('variant-id');

            $.ajax({
                url: '{{ route("buy.add") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: product_id,
                    quantity: quantity,
                    variant_id: variant_id
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $('.cartcount').text(response.count)
                        window.location.href = '/cart'
                    } else {
                        toastr.error(response.message);
                        // toastr.error('An error occurred. Please try again.');
                    }
                },
                error: function() {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        });

    });
</script>
<script>
    document.querySelectorAll('#variant-select li').forEach(function(variant) {
        variant.addEventListener('click', function() {
            var variantId = this.getAttribute('data-vid');
            var currentUrl = new URL(window.location.href);

            // Update or add the v_id query parameter
            currentUrl.searchParams.set('v_id', variantId);

            // Redirect to the new URL
            window.location.href = currentUrl.toString();
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#selectsize').click(function() {
            $('#variant-select').toggle(); // Toggles visibility of the dropdown
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const video = document.getElementById('productVideo');
        const playIcon = document.getElementById('playIcon');
        const pauseIcon = document.getElementById('pauseIcon');

        // Toggle play/pause when clicking on the video or icons
        video.addEventListener('click', togglePlayPause);
        playIcon.addEventListener('click', togglePlayPause);
        pauseIcon.addEventListener('click', togglePlayPause);

        function togglePlayPause() {
            if (video.paused) {
                video.play();
                playIcon.style.display = 'none';
                pauseIcon.style.display = 'block';
            } else {
                video.pause();
                playIcon.style.display = 'block';
                pauseIcon.style.display = 'none';
            }
        }

        // Automatically update icons when video is played or paused
        video.addEventListener('play', function() {
            playIcon.style.display = 'none';
            pauseIcon.style.display = 'block';
        });

        video.addEventListener('pause', function() {
            playIcon.style.display = 'block';
            pauseIcon.style.display = 'none';
        });
    });
</script>

<?php  if($product->id == 10){ ?>
<script type="application/ld+json">
[
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Shop Premium Pickleball Court | PortaCourts",
  "url": "https://www.portacourts.com/product-detail/premium-pickle-ball-court",
  "description": "Check out our professional-grade custom Pickleball courts, designed to achieve precision for optimal traction and ball response. Shop from PortaCourts today!",
  "isPartOf": {
	"@type": "WebSite",
	"name": "Porta Courts",
	"url": "https://www.portacourts.com/"
  },
  "mainEntity": {
	"@type": "Product",
	"name": "Premium Portable Pickleball Court",
	"image": [
  	"https://www.portacourts.com/storage/images/LAJbtgX3kexrZLI8fp7yUfQrdPqRf4VLyUdVefD6.jpg",
  	"https://www.portacourts.com/storage/images/tPDBVHQNXJt7yL1hjCSFnSfzGfGvusWLNiSpmUwh.jpg",
  	"https://www.portacourts.com/storage/images/pwdR6UmmX5zXaBthilWhjcxSB3r3HrT09ts9nGMZ.jpg",
  	"https://www.portacourts.com/storage/images/pD69sCxYwbMHMyg0oVjTHGSuHoothbM5rcjvynLW.jpg"
	],
	"description": "This portable pickleball court is made of durable materials, designed for quick assembly and ideal for players of all skill levels.",
	"sku": "PBC-001",
	"brand": {
  	"@type": "Brand",
  	"name": "Porta Courts"
	},
	"offers": {
  	"@type": "Offer",
  	"url": "https://www.portacourts.com/product-detail/premium-pickle-ball-court",
  	"priceCurrency": "USD",
  	"price": "9600.00",
  	"itemCondition": "https://schema.org/NewCondition",
  	"availability": "https://schema.org/InStock",
  	"seller": {
    	"@type": "Organization",
    	"name": "Porta Courts",
    	"url": "https://www.portacourts.com/",
    	"sameAs": [
      	"https://www.facebook.com/portacourts",
      	"https://www.instagram.com/portacourts"
    	]
  	}
	}
  }
},
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Porta Courts",
  "url": "https://www.portacourts.com/",
  "description": "Shop customized Spikeball & Pickleball courts from PortaCourts! Our portable, durable designs ensure peak performance. Customize your backyard Pickleball court today!",
  "image": "https://www.portacourts.com/webassets/img/gallery-long.png",
  "telephone": "+1-800-272-9717",
  "email": "support@portacourts.com",
  "address": {
	"@type": "PostalAddress",
	"streetAddress": "1002 S Eagle Rd Eagle",
	"addressLocality": "Idaho",
	"addressRegion": "ID",
	"postalCode": "83616",
	"addressCountry": "US"
  },
  "geo": {
	"@type": "GeoCoordinates",
	"latitude": "43.68607",
	"longitude": "-116.35409"
  },
  "openingHoursSpecification": [
	{
  	"@type": "OpeningHoursSpecification",
  	"dayOfWeek": [
    	"Monday",
    	"Tuesday",
    	"Wednesday",
    	"Thursday",
    	"Friday"
  	],
  	"opens": "09:00",
  	"closes": "18:00"
	},
	{
  	"@type": "OpeningHoursSpecification",
  	"dayOfWeek": "Saturday",
  	"opens": "10:00",
  	"closes": "16:00"
	}
  ],
  "priceRange": "$4,000 - $10,000",
  "sameAs": [
	"https://www.facebook.com/portacourts",
	"https://www.instagram.com/portacourts"
  ]
}
]
</script>
<?php  }else{ ?>

<script type="application/ld+json">
[
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Shop Premium Spike Ball Court | PortaCourts",
  "url": "https://www.portacourts.com/product-detail/premium-spike-ball-court",
  "description": "Shop premium Spikeball courts at PortaCourts – durable and portable with easy installation. Built for intense training sessions and matches in any weather conditions.",
  "isPartOf": {
	"@type": "WebSite",
	"name": "Porta Courts",
	"url": "https://www.portacourts.com/"
  },
  "mainEntity": {
	"@type": "Product",
	"name": "Premium Portable Spike Ball Court",
	"image": [
  	"https://www.portacourts.com/storage/images/bz80kmVC0wHP1aSYI4AJ3RfifHp36YpDOcAEEURj.jpg",
  	"https://www.portacourts.com/storage/images/yUitO7Vwhio6cW6v4RuGTxAQj6gB0lkyqFwEaHps.jpg",
  	"https://www.portacourts.com/storage/images/VdVUqOQYn0r9MzeM0xMS1GSClVPWv7VSfzixU004.jpg"
	],
	"description": "This portable spike ball court is made of durable materials, designed for quick assembly and ideal for players of all skill levels.",
	"sku": "SBC-001",
	"brand": {
  	"@type": "Brand",
  	"name": "Porta Courts"
	},
	"offers": {
  	"@type": "Offer",
  	"url": "https://www.portacourts.com/product-detail/premium-spike-ball-court",
  	"priceCurrency": "USD",
  	"price": "4160.00",
  	"itemCondition": "https://schema.org/NewCondition",
  	"availability": "https://schema.org/InStock",
  	"seller": {
    	"@type": "Organization",
    	"name": "Porta Courts",
    	"url": "https://www.portacourts.com/",
    	"sameAs": [
      	"https://www.facebook.com/portacourts",
      	"https://www.instagram.com/portacourts"
    	]
  	}
	}
  }
},
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Porta Courts",
  "url": "https://www.portacourts.com/",
  "description": "Shop customized Spikeball & Pickleball courts from PortaCourts! Our portable, durable designs ensure peak performance. Customize your backyard Pickleball court today!",
  "image": "https://www.portacourts.com/webassets/img/gallery-long.png",
  "telephone": "+1-800-272-9717",
  "email": "support@portacourts.com",
  "address": {
	"@type": "PostalAddress",
	"streetAddress": "1002 S Eagle Rd Eagle",
	"addressLocality": "Idaho",
	"addressRegion": "ID",
	"postalCode": "83616",
	"addressCountry": "US"
  },
  "geo": {
	"@type": "GeoCoordinates",
	"latitude": "43.68607",
	"longitude": "-116.35409"
  },
  "openingHoursSpecification": [
	{
  	"@type": "OpeningHoursSpecification",
  	"dayOfWeek": [
    	"Monday",
    	"Tuesday",
    	"Wednesday",
    	"Thursday",
    	"Friday"
  	],
  	"opens": "09:00",
  	"closes": "18:00"
	},
	{
  	"@type": "OpeningHoursSpecification",
  	"dayOfWeek": "Saturday",
  	"opens": "10:00",
  	"closes": "16:00"
	}
  ],
  "priceRange": "$4,000 - $10,000",
  "sameAs": [
	"https://www.facebook.com/portacourts",
	"https://www.instagram.com/portacourts"
  ]
}
]
</script>
<?php  } ?>

<script>
$(document).ready(function() {
    // Validate the form
    $('#contactForm').validate({
        rules: {
            first_name: {
                required: true,
            },
            subjects: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            message: {
                required: true,
            }
        },
        messages: {
            first_name: {
                required: "First name is required",
                minlength: "First name must be at least 2 characters long"
            },
            subjects: {
                required: "Subjects are required"
            },
            email: {
                required: "Email is required",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Phone number is required",
                digits: "Please enter a valid phone number",
                minlength: "Phone number must be at least 10 digits",
                maxlength: "Phone number must not exceed 15 digits"
            },
            message: {
                required: "Message is required",
                minlength: "Message must be at least 10 characters long"
            }
        },
        errorPlacement: function(error, element) {
            var name = element.attr("name");
            $("#error-" + name).text(error.text());
        },
        submitHandler: function(form) {
            // Clear previous errors
            $('.error-message').text('');
            
            // Submit the form via AJAX
            $.ajax({
                url: '{{ route("contact.submit") }}', // Replace with your route
                method: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    if (response.success) {
                        // alert('Message sent successfully');
                        toastr.success('Message sent successfully');
                        // Reset the form
                        $('#contactForm')[0].reset();
                        $('#requestcallbtn').modal('hide');
                    } else {
                        // Display errors
                        displayErrors(response.errors);
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        }
    });

    function displayErrors(errors) {
        $.each(errors, function(key, value) {
            $('#error-' + key).text(value[0]);
        });
    }
});
</script>

@endsection

@extends('web.utils.master')
@section('content')
@section('head')
<title>My PortaCourts Wishlist</title>
<meta name="description" content="Save your favorite PortaCourts items in your wishlist. Browse and shop later with ease by keeping track of products you're interested in.">
<link rel="canonical" href="https://www.portacourts.com/wishlist" />
@endsection
<section class="py-5">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
                <h2 class="text-capitalize">My Wishlist</h2>
            </div>
        </div>
        <div class="row">
            <div class="row pt-4">
                @if(count($product) > 0)
                @foreach($product as $singleproduct)
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="feature-pro">
                        <div class="product-feature-img product-bg position-relative">
                            <a href="{{route('product_detail',$singleproduct->slug)}}"><img src="{{ asset('storage/' . $singleproduct->product_images[0]->image_url) }}" class="img-fluid product-pic"></a>
                            @php
                            $in_wishlist = App\Models\Wishlist::where(['user_id'=> Auth::id(),'product_id'=>$singleproduct->id])->first();
                            $item = App\Models\ProductVariant::where(['product_id'=>$singleproduct->id])->first();
                            @endphp
                            <a class="icon-wish-product addwishlist" data-product-id="{{ $singleproduct->id }}" data-in-wishlist="{{ $in_wishlist ?? '' }}">
                                <img src="{{ $in_wishlist ? url('/') . '/webassets/img/green-wishlist-bg.svg' : url('/') . '/webassets/img/unfillwishlist.svg' }}" class="wishlist-icon">
                            </a>
                            <!-- <div class="category-product">
                                <p class="text-white mb-0">{{$singleproduct->category->title}}</p>
                            </div> -->
                        </div>
                        <div class="px-3 py-4">
                            <h3 class="mb-2 fw-400 one-line"><a href="{{route('product_detail',$singleproduct->slug)}}" class="text-black">{{$singleproduct->title}}</a></h3>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <p class="mb-0"><span class="primary-theme price-offer">${{$item->discounted_price ?? ''}}.00</span><span class="price-old ms-2">${{$item->price ?? ''}}.00</span> </p>
                                    <div class="d-flex align-items-center gap-1">
                                        @php
                                        $averageRating = $singleproduct->average_rating;
                                        $fullStars = floor($averageRating);
                                        $halfStar = ($averageRating - $fullStars) >= 0.5 ? 1 : 0;
                                        $emptyStars = 5 - $fullStars - $halfStar;
                                        @endphp
                                        @for ($i = 0; $i < $fullStars; $i++) <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor

                                            @if ($halfStar)
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                            @endif

                                            @for ($i = 0; $i < $emptyStars; $i++) <i class="fa fa-star-o" aria-hidden="true"></i>
                                                @endfor
                                    </div>
                                </div>
                                <a class="" href="{{route('product_detail',$singleproduct->slug)}}"><img src="{{url('/')}}/webassets/img/cart.svg"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 ">
                    <div class="empty-cart text-center h-100 py-5">
                        <img src="{{url('/')}}/webassets/img/EmptyCart.svg" class="img-fluid">
                        <h4 class="fw-400">Hey, it's feel so light
                        </h4>
                        <p class="fw-400 pb-2">There is nothing in your cart. Let's add some items.</p>
                        <!-- <a href="{{route('wishlist')}}" class="green-btn py-3">Add Items From Wishlist</a> -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
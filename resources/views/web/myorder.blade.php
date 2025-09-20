{{-- This page has been converted to React component: resources/js/orders/MyOrders.jsx --}}
{{-- The React component preserves all original design and logic --}}

@extends('web.utils.master')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
                <h2 class="text-capitalize">My orders</h2>
            </div>
            @if(count($item) > 0)
            <div class="col-12 pt-4">
                <div class="">
                    <div class="table-responsive table-height ">
                        <table class=" w-100 table cart-table my-order-table">
                            <tbody style="vertical-align: middle; " class="order-tbody my-order-tbody">
                                @foreach($item as $singleitem)
                                <tr style="border-radius:10px;height:60px; border-style: none !important;" class="bg-white border-radius-tr">
                                    <td class="py-3" style="text-align:start; font-size: 16px;font-style: normal;font-weight: 500;">
                                        <div class="d-flex justify-content-start gap-3  cilent-profile-column">
                                            <img src="{{ asset('storage/' . $singleitem->product->product_images[0]->image_url) }}" class="client-profile cart-client-profile">
                                            <div>
                                                <p class="font-oswald  f20 fw-400 one-line text-black mb-0 cart-item-title">
                                                    {{$singleitem->product->title}}</p>
                                                <div class="d-flex align-items-center gap-2">
                                                    <p class="qty-btn font-Yantramanav mt-2 ">Qty: {{$singleitem->qty}}</p>
                                                    <p class="qty-btn font-Yantramanav mt-2 ">Size: {{$singleitem->variant->length}}ftX{{$singleitem->variant->width}}ftx{{$singleitem->variant->thickness}}mm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3" style="text-align:center; font-size: 16px;font-style: normal;font-weight: 600;">
                                        <span class="primary-theme item-price">
                                            $ {{$singleitem->discount_price * $singleitem->qty}}</span>
                                    </td>
                                    <td class="py-3" style="text-align:center; font-size: 16px;font-style: normal;font-weight: 600;">
                                        @if(!!$singleitem->delivertack)
                                        <h6 class="font-Yantramanav sky-blue-text mb-0">Delivered on {{date('M d',strtotime($singleitem->delivertack->created_at))}}</h6>
                                        @endif
                                        <p class="mb-0 fw-400 thank-text font-Yantramanav lh-base">Your Item has been
                                            @if($singleitem->status == 1)
                                            placed
                                            @elseif($singleitem->status == 2)
                                            shipping
                                            @elseif($singleitem->status == 3)
                                            out for delivery
                                            @elseif($singleitem->status == 4)
                                            deliverd
                                            @elseif($singleitem->status == 5)
                                            cancel
                                            @endif
                                        </p>
                                        @if(!!$singleitem->delivertack)
                                        <a href="{{route('product_detail',$singleitem->product_id)}}"><span class="mb-0 fw-400 thank-text font-Yantramanav primary-theme"><i class="fa fa-star me-2" aria-hidden="true"></i>Rate & Review Product
                                            delivered
                                        </span></a>
                                        @endif
                                    </td>
                                    <td class="py-3" style="text-align:end; font-size: 16px;font-style: normal;font-weight: 600;">
                                        <a href="{{route('orderDetail',$singleitem->id)}}" class="rounded-pill green-btn">View Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                    <div class="pagination-order py-3 d-flex align-items-center justify-content-center">
                        <nav aria-label="Page navigation example mb-4">
                        {{$item->links()}}
                            <!-- <ul class="pagination align-items-center">
                                <li class="page-item">
                                    <a class="page-link custom-page fw-500 font-Yantramanav px-1 icon-prev" href="#"><img src="./assets/img/right-arrow-pagi.svg" alt="Previous"></a>
                                </li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">2</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">3</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">4</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">5</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">6</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">7</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">8</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">9</a></li>
                                <li class="page-item"><a class="page-link custom-page fw-500 font-Yantramanav" href="#">10....</a></li>
                                <li class="page-item">
                                    <a class="page-link custom-page fw-500 font-Yantramanav px-1 next-icon" href="#"><img src="./assets/img/left-arrow-pagi.svg" alt="Next"></a>
                                </li>
                            </ul> -->
                            
                        </nav>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 ">
                <div class="empty-cart text-center h-100 py-5">
                    <img src="{{url('/')}}/webassets/img/EmptyCart.svg" class="img-fluid">
                    <h4 class="fw-400">Hey, it's feel so light
                    </h4>
                    <p class="fw-400 pb-2">There is nothing in your order. Let's add some items.</p>
                    <a href="{{route('wishlist')}}" class="green-btn py-3">Add Items From Wishlist</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
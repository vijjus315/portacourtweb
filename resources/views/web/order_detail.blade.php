@extends('web.utils.master')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div class="border-line"></div>
                <h2 class="text-capitalize">order detail</h2>
            </div>
        </div>
        <div class=" order-detail-wrapper bg-white p-4 br15">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-Yantramanav fw-500 order-text">Order ID :<span class="light-grey fw-400">
                            {{$item->order->order_number}}</span></h4>
                    <hr>
                </div>
                <div class="col-lg-6">
                    <div class="border-right-order">
                        <h3 class="font-Yantramanav fw-500 order-text mb-0">Delivery Address</h3>
                        @php
                        $addressJson = $item->order->address;
                        $address = json_decode($addressJson);
                        @endphp
                        <div class="address-delivery mb-3 border-right">
                            <div class="d-inline-block mt-1">
                                <a class="primary-theme light light-green border-0  rounded-pill px-3 py-1 d-flex align-items-center gap-1"><img src="{{url('/')}}/webassets/img/home-icon.svg" class="me-1">Home</a>
                            </div>
                            <p class="primary-theme fw-500 mb-0 lh-base mt-2"></p>
                            <p class="mb-0 fw-400">{{$address->line1}}, {{$address->city}},{{$address->country}} </p>
                            <p class="mb-0 fw-400">Mobile No.  </p>
                            <p class="mb-0 fw-400">Pin Code: {{$address->postal_code}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="">
                        <h3 class="font-Yantramanav fw-500 order-text mb-0">Payment Details</h3>
                        @php
                        $addressJson = $item->order->address;
                        $address = json_decode($addressJson);
                        @endphp
                        <div class="address-delivery mb-3 ">
                            <p class="f18 fw-500 mb-0 lh-base"><strong>Transaction Id: </strong>{{$item->order->transaction_id}}</p>
                            <p class="f18 mb-1 fw-400"><strong>Payment Type: </strong>Credit Card </p>
                            <h3 class="f18 primary-theme">$ {{$item->discount_price * $item->qty}}</h3>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('storage/' . $item->product->product_images[0]->image_url) }}" class="img-fluid pro-order-pic">
                        <div class="">
                            <h6 class="thank-text font-Yantramanav fw-500 mb-0">{{$item->product->title}}</h6>
                            <span class="f11 light-grey fw-500 pb-1">(Price Includes 1 Net, 4 Paddles and 20 Pickleballs)</span>
                            <div class="pt-1">
                                <p class="qty-btn font-Yantramanav mt-0 d-inline-block ">Qty: {{$item->qty}}</p>
                                <p class="qty-btn font-Yantramanav mt-0 d-inline-block ">Size: {{$item->variant->length}} ft X {{$item->variant->width}} ft X {{$item->variant->thickness}} mm</p>
                            </div>
                            <!-- <p class="primary-theme item-price f16 fw-600 mb-0">
                                $ {{$item->price}}</p>
                            <h6 class="mb-0 light-grey font-Yantramanav  f20 fw-400">Delivered on May 26</h6> -->
                        </div>
                    </div>

                </div>
                @php
                $placedstatus = App\Models\OrderTracking::where(['order_item_id'=> $item->id,'status'=>1])->first();
                $shippingstatus = App\Models\OrderTracking::where(['order_item_id'=> $item->id,'status'=>2])->first();
                $outstatus = App\Models\OrderTracking::where(['order_item_id'=> $item->id,'status'=>3])->first();
                $deliveredstatus = App\Models\OrderTracking::where(['order_item_id'=> $item->id,'status'=>4])->first();
                @endphp
                <div class="col-lg-8 mb-4">
                    <div class="orderdetail-progress checkout-steps steps steps-light pt-2 pb-2">
                        <a class="step-item {{ (isset($placedstatus) == 1 ? 'active' : '' ) }} " >
                            <div class="step-label font-Yantramanav fw-400">
                                Order Placed
                            </div>
                            <div class="step-progress check-step-progress">
                            </div>
                            <div class="step-label font-Yantramanav fw-400">
                            {{ isset($placedstatus) == 1 ? $placedstatus->created_at->format('D, jS M') : '' }}
                            </div>
                        </a>
                        <a class="step-item {{ (isset($shippingstatus) == 2 ? 'active' : '' ) }} " href="">
                            <div class="step-label font-Yantramanav fw-400">
                                Shipped
                            </div>
                            <div class="step-progress check-step-progress">
                                <span class="step-count check-counts">
                                </span>
                            </div>
                            <div class="step-label font-Yantramanav fw-400">
                            {{ isset($shippingstatus) == 2 ? $shippingstatus->created_at->format('D, jS M') : '' }}
                            </div>
                        </a>
                        <a class="step-item  {{ (isset($outstatus) == 3 ? 'active' : '' ) }}" href="javascript:">
                            <div class="step-label font-Yantramanav fw-400">
                                Out For Delivery
                            </div>
                            <div class="step-progress check-step-progress">
                                <span class="step-count check-counts">
                                </span>
                            </div>
                            <div class="step-label font-Yantramanav fw-400">
                            {{ isset($outstatus) == 3 ? $outstatus->created_at->format('D, jS M') : '' }}
                            </div>
                        </a>
                        <a class="step-item  {{ (isset($deliveredstatus) == 4 ? 'active' : '' ) }}" href="javascript:">
                            <div class="step-label font-Yantramanav fw-400">
                                Delivered
                            </div>
                            <div class="step-progress check-step-progress">
                                <span class="step-count check-counts">
                                </span>
                            </div>
                            <div class="step-label font-Yantramanav fw-400">
                            {{ isset($deliveredstatus) == 4 ? $deliveredstatus->created_at->format('D, jS M') : '' }}
                            </div>
                        </a>
                    </div>
                </div>
                <hr>
                <!-- <div class="col-12 py-3">
                    <a href="" class="red-btn f16">Cancel Order</a>
                </div> -->
            </div>
            <div class="col-12">
                <div class="">
                </div>
            </div>

        </div>
</section>
@endsection
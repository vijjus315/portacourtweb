@extends('web.utils.master')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-7 mx-auto">
                <div class="pt-0">
                    <div class="text-center">
                        <img src="{{ asset('webassets/img/thanku.png') }}" class="img-fluid pb-3">
                        <h1 class="font-oswald pb-3">Congratulations</h1>
                        <p class="thank-text fw-600 f20">Your order is successfully placed</p>
                        <p class="thank-text fw-600 f20">Order Id : <span id="order-id">{{$order->order_number}}</span></p>
                        <a href="{{route('myOrderList')}}" class="btn green-btn w-50 box-shadow">Go To My Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
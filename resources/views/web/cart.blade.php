@extends('web.utils.master')
@section('content')
@section('head')
<title>Your PortaCourts Cart</title>
<meta name="description" content="View and manage your PortaCourts purchases here with ease. Complete your order for customized Spikeball and Pickleball courts with a secured gateway!">
<link rel="canonical" href="https://www.portacourts.com/cart" />
@endsection
<!-- <section class="py-3">
    <div class="container">
        <div class="checkout-steps steps steps-light pt-2 pb-2">
            <a class="step-item active " href="javascript:void(0)">
                <div class="step-progress check-step-progress ">
                    <span class="step-count check-counts">
                        <img src="{{url('/')}}/webassets/img/cart-grey.svg" class="grey-icon">
                        <img src="{{url('/')}}/webassets/img/cart-color.svg" class="color-icon">
                    </span>
                </div>
                <div class="step-label font-Yantramanav fw-400">
                    Cart
                </div>
            </a>
            <a class="step-item  current" href="javascript:void(0)">
                <div class="step-progress check-step-progress">
                    <span class="step-count check-counts">
                        <img src="{{url('/')}}/webassets/img/shipping-grey.svg" class="grey-icon">
                        <img src="{{url('/')}}/webassets/img/shipping-color.svg" class="color-icon">
                    </span>
                </div>
                <div class="step-label font-Yantramanav fw-400">
                    Shipping And billing
                </div>
            </a>
            <a class="step-item " href="javascript:void(0)">
                <div class="step-progress check-step-progress">
                    <span class="step-count check-counts">
                        <img src="{{url('/')}}/webassets/img/payemt-grey.svg" class="grey-icon">
                        <img src="{{url('/')}}/webassets/img/payment-color.svg" class="color-icon">
                    </span>
                </div>
                <div class="step-label font-Yantramanav fw-400">
                    Payment
                </div>
            </a>
        </div>
    </div>
</section> -->
<section class="pt-5">
    <div class="container">
        <h1 class="text-decoration-underline">Cart</h1>
    </div>
</section>
<section class=" py-5 mb-4 ">
    <div class="container">
        <div class="row common-card-bg">
            <!-- no data show -->
            @if(count($cart) > 0)
            <div class="col-lg-8 mb-3 mb-lg-0 h-100">
                <div class="add-cart-detail px-2 ">
                    <div class="table-responsive table-height ">
                        <table class=" w-100 table cart-table">
                            <thead style="vertical-align:middle;height:70px; " class="border-grey">
                                <tr>
                                    <th class="font-Yantramanav" style=" font-size:20px; font-style: normal;font-weight: 600; color: #01073D; padding-bottom:0px; text-align:start;">
                                        Product</th>
                                    <th class="font-Yantramanav" style=" font-size:20px; font-style: normal;font-weight: 600; color: #01073D; padding-bottom:0px; text-align:center;">
                                        Size</th>
                                    <th class="font-Yantramanav" style=" font-size:20px; font-style: normal;font-weight: 600; color: #01073D; padding-bottom:0px; text-align:center;">
                                        Unit Price</th>
                                    <th class="font-Yantramanav" style=" font-size:20px; font-style: normal;font-weight: 600; color: #01073D; padding-bottom:0px; text-align:center;">
                                        Qty</th>
                                    <th class="font-Yantramanav" style=" font-size:20px; font-style: normal;font-weight: 600; color: #01073D; padding-bottom:0px; text-align:center;">
                                        Price</th>

                                </tr>
                            </thead>
                            @endif
                            <tbody style="vertical-align: middle; ">
                                @php
                                $subtotal = 0;
                                $total = 0;
                                $totalDiscount = 0;
                                @endphp
                                @if(count($cart) > 0)
                                @foreach($cart as $singlecart)
                                @php
                                $checkqty = $singlecart->variant->quantity == 0 ? 0 : 1;
                                $originalPrice = $singlecart->variant->price;
                                $price = $singlecart->variant->discounted_price;
                                $itemSubtotal = $price * $singlecart->quantity;
                                $itemDiscount = ($originalPrice - $price) * $singlecart->quantity;
                                $subtotal += $originalPrice * $singlecart->quantity;
                                $total += $itemSubtotal;
                                $totalDiscount += $itemDiscount;
                                @endphp
                                <tr style="height:60px;" class="go-to-order">
                                    <td class="py-3" style="text-align:start; font-size: 16px;font-style: normal;font-weight: 500;">
                                        <div class="d-flex justify-content-start gap-3 align-items-center cilent-profile-column">
                                            <img src="{{ asset('storage/' . $singlecart->product->product_images[0]->image_url) ?? '' }}" class="client-profile cart-client-profile">
                                            <div>
                                                <p class="text-capitalize font-oswald  f20 fw-400 one-line text-black mb-0 cart-item-title">
                                                    {{$singlecart->product->title ?? ''}}
                                                </p>
                                                @if(count($singlecart->product->variants) > 1)
                                                <span class="f10">(Price Includes 1 Net, 4 Paddles and 20 Pickleballs)</span>
                                                @endif
                                                <div class="d-flex align-items-center gap-2">
                                                    <a class="text-danger text-decoration-underline font-Yantramanav remove-item" data-variant-id="{{$singlecart->variant_id}}">Remove</a>
                                                    @if($checkqty == 0)
                                                    <a class="text-danger out-btn font-Yantramanav"><img src="{{url('/')}}/webassets/img/outofstock.svg" class="me-2">Out of
                                                        Stock</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3" style="text-align:center; font-size: 16px;font-style: normal;font-weight: 600;">
                                        {{$singlecart->variant->length}} ft X {{$singlecart->variant->width}} ft X {{$singlecart->variant->thickness}} mm
                                    </td>
                                    <td class="py-3 {{$checkqty == 0 ? 'disabled' : ''}}" style="text-align:center; font-size: 16px;font-style: normal;font-weight: 600;">
                                        <span class="text-purple item-price">
                                            ${{$price}}</span>
                                    </td>
                                    <td class="py-3 {{$checkqty == 0 ? 'disabled' : ''}}" style="text-align:center; font-size: 16px;font-style: normal;font-weight: 500; ">
                                        <div class="d-flex justify-content-center align-items-center qty-decre">
                                            <a class="text-decoration-underline add-remove-item" data-type="decrement" data-product-id="{{$singlecart->product->id}}" data-variant-id="{{$singlecart->variant_id}}" data-quantity="{{$singlecart->quantity}}"><img src="{{url('/')}}/webassets/img/minus.svg" alt="grey-minus"></a>
                                            <p class="fw-500 f20 text-black px-3  mb-0 item-count">
                                                {{$singlecart->quantity ?? ''}}
                                            </p>
                                            <a class="text-decoration-underline add-remove-item" data-type="increment" data-product-id="{{$singlecart->product->id}}" data-variant-id="{{$singlecart->variant_id}}" data-quantity="{{$singlecart->quantity}}"><img src="{{url('/')}}/webassets/img/plus.svg" alt="grey-plus"></a>
                                        </div>

                                    </td>
                                    <td class="py-3 {{$checkqty == 0 ? 'disabled' : ''}}" style="text-align:center; font-size: 16px;font-style: normal;font-weight: 600;">
                                        <span class="text-purple item-price">
                                        ${{$itemSubtotal}}</span>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-end mt-4 mb-2 d-flex ms-auto justify-content-end align-items-end">
                    <a href="javascript:void(0)" id="placeOrderButton" class="green-btn w-100 w-auto d-flex justify-content-center align-items-center">Place Order</a>
                </div>
            </div>
            @endif
            @if(count($cart) > 0)
            <div class="col-lg-4">
                <div class="order-details-side px-1 px-md-3 py-3 bg-white">
                    <h4 class="fw-700 font-oswald ">Order Summary</h4>
                    <ul class="ps-0 list-style-none pt-3">
                        <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Total MRP</p>
                                <p class="fw-700 f17-size mb-0 text-black cart-total" id="subtotal">${{$subtotal}}</p>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Discount on MRP</p>
                                <p class="fw-700 f17-size mb-0 " id="totalDiscount" style="color:#1ba685">-${{$totalDiscount}}</p>
                            </div>
                        </li>
                        @php
                        if(!!$coupon){
                           $couponAmount = $coupon->getDiscountAmount($total);
                        }
                        @endphp
                        @if(!!$coupon)
                        <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Coupon Discount</p>
                                <p class="fw-700 f17-size mb-0 " id="totalDiscount" style="color:#1ba685">-${{$couponAmount}}</p>
                            </div>
                        </li>
                        @endif
                        <li class="border-bottom">
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Shipping Fee</p>
                                <p class="fw-700 f17-size mb-0 " style="color:#1ba685">FREE</p>
                            </div>
                        </li>

                        <!-- <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Tax</p>
                                <p class="fw-700 f17-size mb-0 text-black">$00.00</p>
                            </div>
                        </li> -->
                        @php
                        $finalAmount = isset($coupon) ? $total - $couponAmount : $total;
                        @endphp
                        <li>
                            <div class="d-flex justify-content-between pb-2 pt-3">
                                <p class="fw-700 f17">Total Amount</p>
                                <h3 class="fw-700 sky-blue-text font-Yantramanav" >${{$finalAmount}}</h3>
                                <input type="hidden" id="finalTotal" value="{{$total}}">
                            </div>
                        </li>
                    </ul>
                    <div class="coupon-section mb-3">
                        <h4 class="mb-3">Coupons</h4>
                        <div class="d-flex justify-content-between gap-1 pb-2  align-items-center w-100 coupon-res">
                            <div class="d-flex align-items-center gap-2 w-100">
                                <img src="{{url('/')}}/webassets/img/couponstag.png" class="" style="width: 20px; height:20px; object-fit:contain;">
                                @if(!$coupon)
                                <p class="font-oswald text-black fw-600 mb-0 applytext">Apply Coupons</p>
                                @endif
                                <input type="text" id="couponCode" class="form-control  coupon-input" placeholder="Enter Coupon Code" value="{{$coupon->coupon_code ?? ''}}" style="display:none">
                                @if(!!$coupon)
                                <div class="">
                                    <p class="font-oswald text-black fw-600 mb-0 lh-md">1 Coupons applied</p>
                                    <p class="mb-0 primary-theme lh-sm">You saved additional {{$coupon->discount}}%</p>
                                </div>
                                @endif
                            </div>
                            @if(!$coupon)
                            <button type="button" class="btn green-btn " id="applyCoupon">Apply</button>
                            @endif
                            @if(!!$coupon)
                            <a type="button" class="btn green-btn bg-danger " href="{{route('removeCoupon')}}">remove</a>
                            @endif
                        </div>
                        <div id="couponMessage" class="text-danger"></div>
                    </div>
                </div>
            </div>

            @else
            <div class="col-12 ">
                <div class="empty-cart text-center h-100 py-5">
                    <img src="{{url('/')}}/webassets/img/EmptyCart.svg" class="img-fluid">
                    <h4 class="fw-400">Hey, it's feel so light
                    </h4>
                    <p class="fw-400 pb-2">There is nothing in your cart. Let's add some items.</p>
                    <a href="{{route('wishlist')}}" class="green-btn py-3">Add Items From Wishlist</a>
                </div>
            </div>
            @endif
        </div>

    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Handle increment and decrement button clicks
        $('.add-remove-item').on('click', function(e) {
            e.preventDefault();

            const type = $(this).data('type');
            const productId = $(this).data('product-id');
            const variantId = $(this).data('variant-id');

            let quantity = parseInt($(this).data('quantity'));

            if (type === 'increment') {
                quantity++;
            } else if (type === 'decrement' && quantity > 1) {
                quantity--;
            }

            $.ajax({
                url: '{{ route("cart.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity,
                    variantId: variantId,
                },
                success: function(response) {
                    if (response.success) {
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                },
                error: function() {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        });

        // Handle remove button click
        $('.remove-item').on('click', function(e) {
            e.preventDefault();

            const variantId = $(this).data('variant-id');

            if (confirm('Are you sure you want to remove this item from your cart?')) {
                $.ajax({
                    url: '{{ route("cart.remove") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        variant_id: variantId
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#applyCoupon').on('click', function() {
            $('.applytext').hide();
            $('#couponCode').show();
            const couponCode = $('#couponCode').val();
            const subtotal = parseFloat("{{ $subtotal }}");

            if (!couponCode) {
                $('#couponMessage').text('Please enter a coupon code.');
                return;
            }

            $.ajax({
                url: '{{ route("cart.applyCoupon") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    coupon_code: couponCode,
                    subtotal: subtotal,
                },
                success: function(response) {
                    if (response.success) {
                        $('#couponMessage').text('');
                        // const couponDiscount = response.discount;

                        // Show the coupon discount row
                        // $('#couponDiscountContainer').show();
                        // $('#couponDiscount').text('$' + couponDiscount.toFixed(2));

                        // Calculate the new total after applying both discounts
                        // const newTotal = subtotal - couponDiscount - parseFloat($('#totalDiscount').text().replace('$', ''));
                        // $('#finalTotal').text('$' + newTotal.toFixed(2));

                        toastr.success(response.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        $('#couponMessage').text(response.message);
                        toastr.error(response.message);
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
    $('#placeOrderButton').on('click', function() {
        const couponCode = $('#couponCode').val();
        const total = parseFloat($('#finalTotal').val());

        $.ajax({
            url: '{{ route("checkout") }}', // Call your checkout function
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                coupon_code: couponCode,
                total: total,
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect_url; // Redirect to confirmation or payment page
                } else {
                    toastr.error('Failed to place the order. Please try again.');
                }
            },
            error: function() {
                toastr.error('An error occurred. Please try again.');
            }
        });
    });
</script>

@endsection
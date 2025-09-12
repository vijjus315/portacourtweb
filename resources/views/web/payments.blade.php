@extends('web.utils.master')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="checkout-steps steps steps-light pt-2 pb-2">
            <a class="step-item active " href="javascript:void(0)">
                <div class="step-progress check-step-progress">
                    <span class="step-count check-counts">
                        <img src="{{url('/')}}/webassets/img/cart-grey.svg" class="grey-icon">
                        <img src="{{url('/')}}/webassets/img/cart-color.svg" class="color-icon">
                    </span>
                </div>
                <div class="step-label font-Yantramanav fw-400">
                    Cart
                </div>
            </a>
            <a class="step-item active current" href="javascript:void(0)">
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
            <a class="step-item  active" href="javascript:void(0)">
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
</section>


<!-- checkout page start -->

<section class="py-5">
    <div class="container">
        <div class="row common-card-bg">
            <div class="col-lg-8 mb-3 mb-lg-0 h-100">
                <div class="payemt-method bg-white br-15 h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 border-bottom font-Yantramanav">Checkout</h3>
                    </div>
                    <hr>
                    <ul class="list-style-none ps-0     ">
                        <li class=" mb-4 ">
                            <a class="d-flex justify-content-between  w-100 pt-3 gap-3 pt-sm-0 cursor-pointer booking-detail position-relative">
                                <div class="">
                                    <h4 class="fw-500 font-Yantramanav text-black">Delivery Address</h4>

                                    <!-- <button class="primary-theme light light-green border-0 rounded-pill px-3 py-1 d-flex align-items-center gap-1"><img src="{{url('/')}}/webassets/img/home-icon.svg">Home</button> -->
                                    @if($address->address_type == 'home')
                                    <button class="primary-theme light light-green border-0 rounded-pill px-3 py-1 d-flex align-items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                            <path d="M16.0772 6.34367L9.17718 0.336265C8.92687 0.119385 8.60676 0 8.27556 0C7.94436 0 7.62426 0.119385 7.37394 0.336265L0.475478 6.33976C0.263931 6.52162 0.113142 6.7639 0.0433877 7.03401C-0.0263665 7.30412 -0.011741 7.58912 0.0852976 7.85067C0.182336 8.11222 0.357134 8.33779 0.586187 8.49704C0.81524 8.6563 1.08756 8.7416 1.36654 8.74147H2.21144V13.6309C2.21185 13.9941 2.35633 14.3422 2.61316 14.5988C2.86999 14.8555 3.21817 14.9998 3.58127 15H5.53706C5.90003 14.9996 6.24802 14.8552 6.50467 14.5986C6.76133 14.3419 6.9057 13.9939 6.90612 13.6309V11.6752C6.90617 11.4835 6.94636 11.294 7.02411 11.1188C7.10185 10.9437 7.21543 10.7867 7.35751 10.6581C7.49986 10.5286 7.66812 10.4307 7.85114 10.3711C8.03416 10.3115 8.22777 10.2915 8.41912 10.3124C8.7682 10.3664 9.08546 10.5463 9.31112 10.818C9.53678 11.0898 9.65526 11.4347 9.64422 11.7878V13.6302C9.64464 13.9931 9.78901 14.3411 10.0457 14.5978C10.3023 14.8544 10.6503 14.9988 11.0133 14.9992H12.9691C13.332 14.9988 13.68 14.8544 13.9367 14.5978C14.1933 14.3411 14.3377 13.9931 14.3381 13.6302V8.74069H15.183C15.4614 8.74053 15.733 8.65533 15.9616 8.49652C16.1902 8.3377 16.3648 8.11284 16.4621 7.85204C16.5593 7.59124 16.5746 7.30695 16.5058 7.03724C16.437 6.76753 16.2875 6.52526 16.0772 6.34289V6.34367Z" fill="currentColor" />
                                        </svg>
                                        Home
                                    </button>
                                    @elseif($address->address_type == 'work')
                                    <button class="primary-theme light light-green border-0 rounded-pill px-3 py-1 d-flex align-items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                            <path d="M6.80937 1.24394C6.80937 1.0925 6.93257 0.969305 7.08401 0.969305H9.4588C9.61024 0.969305 9.73344 1.0925 9.73344 1.24394V1.86591H10.7027V1.24394C10.7027 0.558029 10.1447 0 9.4588 0H7.08401C6.39809 0 5.84006 0.558029 5.84006 1.24394V1.86591H6.80937V1.24394ZM9.85056 9.02236V9.64879C9.85056 9.75061 9.8185 9.84984 9.75891 9.93241C9.69932 10.015 9.61525 10.0767 9.51861 10.1088L8.4241 10.4721C8.32497 10.505 8.21787 10.505 8.11874 10.4721L7.02423 10.1088C6.92759 10.0767 6.84351 10.015 6.78393 9.93241C6.72434 9.84985 6.69227 9.75061 6.69228 9.64879V9.02236L1.51153 7.72717C0.923683 7.58023 0.407367 7.28058 0 6.87706V14.0307C0 14.566 0.433958 15 0.969305 15H15.5735C16.1089 15 16.5428 14.566 16.5428 14.0307V6.87706C16.1354 7.28058 15.6191 7.58023 15.0313 7.72717L9.85056 9.02236ZM15.3231 13.2956C15.3231 13.5633 15.1061 13.7803 14.8384 13.7803H12.6494C12.3818 13.7803 12.1648 13.5633 12.1648 13.2956C12.1648 13.028 12.3818 12.811 12.6494 12.811H14.8384C15.1061 12.811 15.3231 13.028 15.3231 13.2956Z" fill="currentColor" />
                                            <path d="M15.5735 2.83545H0.969305C0.433958 2.83545 0 3.26941 0 3.80475V4.55005C0 5.60815 0.720097 6.53044 1.74659 6.78705L6.69225 8.02346V7.82333C6.69225 7.55568 6.90924 7.33868 7.1769 7.33868H9.36591C9.63357 7.33868 9.85056 7.55568 9.85056 7.82333V8.02346L14.7962 6.78705C15.8227 6.53044 16.5428 5.60815 16.5428 4.55005V3.80475C16.5428 3.26941 16.1089 2.83545 15.5735 2.83545ZM8.88126 9.29926V8.30799H7.66155V9.29926L8.27141 9.50169L8.88126 9.29926Z" fill="currentColor" />
                                        </svg>
                                        Work
                                    </button>
                                    @elseif($address->address_type == 'hotel')
                                    <button class="primary-theme light light-green border-0 rounded-pill px-3 py-1 d-flex align-items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                            <path d="M3.75 15H5.24414C5.28299 15 5.32025 14.9846 5.34772 14.9571C5.37519 14.9296 5.39062 14.8924 5.39062 14.8535V11.8475C5.39062 11.7791 5.34284 11.7214 5.27645 11.7047C5.06578 11.6521 4.91171 11.457 4.92237 11.2276C4.93412 10.9754 5.15127 10.7812 5.40375 10.7812H9.59619C9.84867 10.7812 10.0658 10.9754 10.0776 11.2276C10.0883 11.457 9.93416 11.6521 9.72349 11.7047C9.6571 11.7213 9.60932 11.7791 9.60932 11.8475V14.8535C9.60932 14.8924 9.62475 14.9296 9.65222 14.9571C9.67969 14.9846 9.71695 15 9.7558 15H11.1035C11.1843 15 11.2499 14.9346 11.2499 14.8537V2.8125C11.2499 2.5536 11.0401 2.34375 10.7812 2.34375H4.21875C3.95985 2.34375 3.75 2.5536 3.75 2.8125V15ZM9.14062 4.21875C9.14062 3.95977 9.35039 3.75 9.60938 3.75C9.86836 3.75 10.0781 3.95977 10.0781 4.21875V4.6875C10.0781 4.94648 9.86836 5.15625 9.60938 5.15625C9.35039 5.15625 9.14062 4.94648 9.14062 4.6875V4.21875ZM9.14062 6.5625C9.14062 6.30352 9.35039 6.09375 9.60938 6.09375C9.86836 6.09375 10.0781 6.30352 10.0781 6.5625V7.03125C10.0781 7.29023 9.86836 7.5 9.60938 7.5C9.35039 7.5 9.14062 7.29023 9.14062 7.03125V6.5625ZM9.14062 8.90625C9.14062 8.64727 9.35039 8.4375 9.60938 8.4375C9.86836 8.4375 10.0781 8.64727 10.0781 8.90625V9.375C10.0781 9.63398 9.86836 9.84375 9.60938 9.84375C9.35039 9.84375 9.14062 9.63398 9.14062 9.375V8.90625ZM7.03125 4.21875C7.03125 3.95977 7.24102 3.75 7.5 3.75C7.75898 3.75 7.96875 3.95977 7.96875 4.21875V4.6875C7.96875 4.94648 7.75898 5.15625 7.5 5.15625C7.24102 5.15625 7.03125 4.94648 7.03125 4.6875V4.21875ZM7.03125 6.5625C7.03125 6.30352 7.24102 6.09375 7.5 6.09375C7.75898 6.09375 7.96875 6.30352 7.96875 6.5625V7.03125C7.96875 7.29023 7.75898 7.5 7.5 7.5C7.24102 7.5 7.03125 7.29023 7.03125 7.03125V6.5625ZM7.03125 8.90625C7.03125 8.64727 7.24102 8.4375 7.5 8.4375C7.75898 8.4375 7.96875 8.64727 7.96875 8.90625V9.375C7.96875 9.63398 7.75898 9.84375 7.5 9.84375C7.24102 9.84375 7.03125 9.63398 7.03125 9.375V8.90625ZM4.92188 4.21875C4.92188 3.95977 5.13164 3.75 5.39062 3.75C5.64961 3.75 5.85938 3.95977 5.85938 4.21875V4.6875C5.85938 4.94648 5.64961 5.15625 5.39062 5.15625C5.13164 5.15625 4.92188 4.94648 4.92188 4.6875V4.21875ZM4.92188 6.5625C4.92188 6.30352 5.13164 6.09375 5.39062 6.09375C5.64961 6.09375 5.85938 6.30352 5.85938 6.5625V7.03125C5.85938 7.29023 5.64961 7.5 5.39062 7.5C5.13164 7.5 4.92188 7.29023 4.92188 7.03125V6.5625ZM4.92188 8.90625C4.92188 8.64727 5.13164 8.4375 5.39062 8.4375C5.64961 8.4375 5.85938 8.64727 5.85938 8.90625V9.375C5.85938 9.63398 5.64961 9.84375 5.39062 9.84375C5.13164 9.84375 4.92188 9.63398 4.92188 9.375V8.90625Z" fill="currentColor" />
                                            <path d="M6.47461 15H8.52539C8.56424 15 8.6015 14.9846 8.62897 14.9571C8.65644 14.9296 8.67188 14.8924 8.67188 14.8535V11.8652C8.67188 11.8264 8.65644 11.7891 8.62897 11.7617C8.6015 11.7342 8.56424 11.7188 8.52539 11.7188H6.47461C6.43576 11.7188 6.3985 11.7342 6.37103 11.7617C6.34356 11.7891 6.32812 11.8264 6.32812 11.8652V14.8535C6.32812 14.8924 6.34356 14.9296 6.37103 14.9571C6.3985 14.9846 6.43576 15 6.47461 15ZM10.0781 0.46875C10.0781 0.209854 9.86827 0 9.60938 0H5.39062C5.13173 0 4.92188 0.209854 4.92188 0.46875V1.25977C4.92188 1.279 4.92566 1.29805 4.93303 1.31582C4.94039 1.3336 4.95118 1.34974 4.96478 1.36335C4.97838 1.37695 4.99453 1.38774 5.0123 1.3951C5.03007 1.40246 5.04912 1.40625 5.06836 1.40625H9.93164C9.95088 1.40625 9.96993 1.40246 9.9877 1.3951C10.0055 1.38774 10.0216 1.37695 10.0352 1.36335C10.0488 1.34974 10.0596 1.3336 10.067 1.31582C10.0743 1.29805 10.0781 1.279 10.0781 1.25977V0.46875ZM14.5312 5.39062H12.334C12.2951 5.39062 12.2579 5.40606 12.2304 5.43353C12.2029 5.461 12.1875 5.49826 12.1875 5.53711V14.8535C12.1875 14.8924 12.2029 14.9296 12.2304 14.9571C12.2579 14.9846 12.2951 15 12.334 15H14.5312C14.7901 15 15 14.7901 15 14.5312V5.85938C15 5.60048 14.7901 5.39062 14.5312 5.39062ZM14.0625 12.4219C14.0625 12.6809 13.8527 12.8906 13.5938 12.8906C13.3348 12.8906 13.125 12.6809 13.125 12.4219V11.9531C13.125 11.6941 13.3348 11.4844 13.5938 11.4844C13.8527 11.4844 14.0625 11.6941 14.0625 11.9531V12.4219ZM14.0625 10.3125C14.0625 10.5715 13.8527 10.7812 13.5938 10.7812C13.3348 10.7812 13.125 10.5715 13.125 10.3125V9.84375C13.125 9.58477 13.3348 9.375 13.5938 9.375C13.8527 9.375 14.0625 9.58477 14.0625 9.84375V10.3125ZM14.0625 8.20312C14.0625 8.46211 13.8527 8.67188 13.5938 8.67188C13.3348 8.67188 13.125 8.46211 13.125 8.20312V7.73438C13.125 7.47539 13.3348 7.26562 13.5938 7.26562C13.8527 7.26562 14.0625 7.47539 14.0625 7.73438V8.20312ZM0 5.85938V14.5312C0 14.7901 0.209854 15 0.46875 15H2.66602C2.68525 15 2.7043 14.9962 2.72207 14.9888C2.73985 14.9815 2.75599 14.9707 2.7696 14.9571C2.7832 14.9435 2.79399 14.9273 2.80135 14.9096C2.80871 14.8918 2.8125 14.8728 2.8125 14.8535V5.53711C2.8125 5.51787 2.80871 5.49882 2.80135 5.48105C2.79399 5.46328 2.7832 5.44713 2.7696 5.43353C2.75599 5.41993 2.73985 5.40914 2.72207 5.40178C2.7043 5.39441 2.68525 5.39062 2.66602 5.39062H0.46875C0.209854 5.39062 0 5.60048 0 5.85938ZM0.9375 7.73438C0.9375 7.47539 1.14727 7.26562 1.40625 7.26562C1.66523 7.26562 1.875 7.47539 1.875 7.73438V8.20312C1.875 8.46211 1.66523 8.67188 1.40625 8.67188C1.14727 8.67188 0.9375 8.46211 0.9375 8.20312V7.73438ZM0.9375 9.84375C0.9375 9.58477 1.14727 9.375 1.40625 9.375C1.66523 9.375 1.875 9.58477 1.875 9.84375V10.3125C1.875 10.5715 1.66523 10.7812 1.40625 10.7812C1.14727 10.7812 0.9375 10.5715 0.9375 10.3125V9.84375ZM0.9375 11.9531C0.9375 11.6941 1.14727 11.4844 1.40625 11.4844C1.66523 11.4844 1.875 11.6941 1.875 11.9531V12.4219C1.875 12.6809 1.66523 12.8906 1.40625 12.8906C1.14727 12.8906 0.9375 12.6809 0.9375 12.4219V11.9531Z" fill="currentColor" />
                                        </svg>
                                        Hotel
                                    </button>
                                    @elseif($address->address_type == 'other')
                                    <button class="primary-theme light light-green border-0 rounded-pill px-3 py-1 d-flex align-items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 12 15" fill="none">
                                            <path d="M5.83333 0C4.28624 0 2.80251 0.614582 1.70854 1.70854C0.614581 2.80251 0 4.28624 0 5.83333C0 10.5556 5.83333 15 5.83333 15C5.83333 15 11.6667 10.5556 11.6667 5.83333C11.6667 4.28624 11.0521 2.80251 9.95812 1.70854C8.86416 0.614582 7.38043 0 5.83333 0ZM5.83333 8.61111C5.28394 8.61111 4.74689 8.4482 4.29008 8.14297C3.83328 7.83775 3.47724 7.40392 3.267 6.89634C3.05676 6.38877 3.00175 5.83025 3.10893 5.29142C3.21611 4.75258 3.48067 4.25763 3.86915 3.86915C4.25763 3.48067 4.75258 3.21611 5.29142 3.10893C5.83025 3.00175 6.38877 3.05676 6.89634 3.267C7.40392 3.47724 7.83775 3.83328 8.14297 4.29008C8.4482 4.74689 8.61111 5.28394 8.61111 5.83333C8.61111 6.57005 8.31845 7.27658 7.79752 7.79752C7.27658 8.31845 6.57005 8.61111 5.83333 8.61111Z" fill="currentColor" />
                                        </svg>
                                        Other
                                    </button>
                                    @endif
                                    <p class="fw-500 f18  mb-0 primary-theme font-oswald one-line">{{$address->first_name}} {{$address->last_name}}</p>
                                    <p class="fw-500 f14 menu-description mb-1 lh-base">{{$address->street_address}}, {{$address->city}}, {{$address->country}}</p>
                                    <p class="fw-500 f14 menu-description mb-0 lh-base">Mobile No. {{$address->phone}}</p>
                                    <p class="fw-500 f14 menu-description mb-0">Pin Code: {{$address->postcode}}</p>
                                </div>
                            </a>
                        </li>
                        <hr>
                    </ul>
                    @php
                    $subtotal = 0;
                    $total = 0;
                    $totalDiscount = 0;
                    @endphp
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
                    <div class="table-responsive table-height ">
                        <table class=" w-100 table cart-table">
                            <tbody style="vertical-align: middle; ">
                                <tr style="height:60px;" class="go-to-order">
                                    <td class="py-3" style="text-align:start; font-size: 16px;font-style: normal; width:34%;font-weight: 500;">
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
                                                    <a class="text-danger text-decoration-underline font-Yantramanav  remove-item" data-product-id="{{$singlecart->product->id}}">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 " style="text-align:center; font-size: 16px;font-style: normal; width:30%;font-weight: 600;">
                                        <div class="d-flex align-items-center gap-2">
                                            <p class="qty-btn font-Yantramanav mt-2 ">{{$singlecart->variant->length}} ft X {{$singlecart->variant->width}} ft X {{$singlecart->variant->thickness}} mm</p>
                                        </div>
                                    </td>
                                    <td class="py-3 " style="text-align:center; font-size: 16px;font-style: normal; width:14%;font-weight: 600;">
                                        <div class="d-flex align-items-center gap-2">
                                            <p class="qty-btn font-Yantramanav mt-2 ">Qty: {{$singlecart->quantity ?? ''}}</p>
                                        </div>
                                    </td>
                                    <td class="py-3 " style="text-align:end; font-size: 16px;font-style: normal; width:22%;font-weight: 600;">
                                        <span class="text-purple item-price">$
                                            {{$itemSubtotal}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-details-side px-1 px-md-3 py-3 bg-white">
                    <h4 class="fw-700 font-oswald ">Order Summery</h4>
                    <ul class="ps-0 list-style-none pt-3">
                        <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Sub Total</p>
                                <p class="fw-700 f17-size mb-0 text-black cart-total">${{$subtotal}}.00</p>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Discount</p>
                                <p class="fw-700 f17-size mb-0 text-black">${{$totalDiscount}}.00</p>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Delivery</p>
                                <p class="fw-700 f17-size mb-0 text-black">$00.00</p>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between pb-2">
                                <p class="fw-400 f17-size mb-0">Tax</p>
                                <p class="fw-700 f17-size mb-0 text-black">$00.00</p>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between pb-2 pt-3">
                                <p class="fw-400 f17">Total</p>
                                <h3 class="fw-700 sky-blue-text font-Yantramanav">$
                                    {{$total}}.00
                                </h3>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center mt-5 mb-2">
                        <button type="button" id="addCardBtn" class="green-btn w-100">Checkout</button>
                    </div>

                </div>
            </div>
            <div class="col-12 d-none">
                <div class="empty-cart text-center h-100 py-5">
                    <img src="{{url('/')}}/webassets/img/EmptyCart.svg" class="img-fluid">
                    <h4 class="fw-400">Hey, it's feel so light
                    </h4>
                    <p class="fw-400 pb-2">There is nothing in your cart. Let's add some items.</p>
                    <a href="" class="green-btn py-3">Add Items From Wishlist</a>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- checkout page end -->

<!-- Stripe Payment Modal -->
<div class="modal fade" id="stripePaymentModal" tabindex="-1" role="dialog" aria-labelledby="stripeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0" id="stripeModalLabel">Add Card</h3>
                <button type="button" class="btn-closed border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('webassets/img/cross.svg') }}" class="img-fluid">

                </button>
            </div>
            <div class="modal-body pt-0">
                <form id="payment-form" action="{{ route('handle.stripe.payment') }}" method="POST">
                    @csrf
                    <div id="card-element"><!-- A Stripe Element will be inserted here. --></div>
                    <button type="submit" class="btn  mt-3 green-btn d-flex mx-auto justify-content-center w-50">Pay</button>
                </form>
                <div id="card-errors" role="alert"></div>
            </div>
        </div>
    </div>
</div>

<!-- Congratulations Modal -->
<div class="modal fade" id="congrate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close" id="closeCongratulationsModal"><img src="{{ asset('webassets/img/cross.svg') }}"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{ asset('webassets/img/thanku.png') }}" class="img-fluid pb-3">
                    <h1 class="font-oswald pb-3">Congratulations</h1>
                    <p class="thank-text fw-600 f20">Your order is successfully placed</p>
                    <p class="thank-text fw-600 f20">Order Id : <span id="order-id"></span></p>
                </div>
                <div class="pt-4 pb-3">
                    <a href="{{route('myOrderList')}}" class="btn green-btn w-100 box-shadow">Go To My Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stripe = Stripe("{{ env('STRIPE_PUBLIC_KEY') }}"); // Replace with your Stripe public key
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        // Add an instance of the card Element into the `card-element` div
        cardElement.mount('#card-element');

        // Handle form submission
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    // Inform the customer that there was an error
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server via AJAX
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Function to handle the token
        function stripeTokenHandler(token) {
            // Prepare the form data
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('stripeToken', token.id);

            // Send the token to your server via AJAX
            fetch("{{ route('handle.stripe.payment') }}", {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close the Stripe modal
                        $('#stripePaymentModal').modal('hide');

                        // Set the order ID in the congratulations modal
                        document.getElementById('order-id').textContent = data.order_id;

                        // Show the congratulations modal
                        $('#congrate').modal('show');
                    } else {
                        // Handle the error
                        const errorElement = document.getElementById('card-errors');
                        errorElement.textContent = data.error;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = 'An error occurred while processing your payment.';
                });
        }

        // Add event listener to the "Add Card" button to open the modal
        document.getElementById('addCardBtn').addEventListener('click', function() {
            $('#stripePaymentModal').modal('show');
        });

        document.getElementById('closeCongratulationsModal').addEventListener('click', function() {
            window.location.href = "{{ route('cart') }}";
        });
    });
</script>

<script>
    $('.remove-item').on('click', function(e) {
        e.preventDefault();

        const productId = $(this).data('product-id');

        if (confirm('Are you sure you want to remove this item from your cart?')) {
            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
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
</script>

@endsection
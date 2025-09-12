<header class="font-Yantramanav header-wrapper ">
    <nav class="navbar navbar-expand-lg pt-0  pb-0">
        <div class="container">
            <a class="navbar-brand py-0" href="{{route('home')}}"><img src="{{url('/')}}/webassets/img/logo.svg" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-white" aria-hidden="true"></i>

            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    
                    <li class="nav-item px-2">
                        <a class="nav-link {{ Request::segment(1) == 'products' ? 'active' : '' }}" href="{{route('product')}}">Products</a>
                    </li>
                    <!-- <li class="nav-item px-2">
                        <a class="nav-link " href="#">Category</a>
                    </li> -->
                    <li class="nav-item px-2">
                        <a class="nav-link {{ Request::segment(1) == 'blog' || Request::segment(1) == 'blog-detail' ? 'active' : '' }}" href="{{route('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link {{ Request::segment(1) == 'about-us' ? 'active' : '' }}" href="{{route('aboutus')}}">About Us</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link {{ Request::segment(1) == 'contact' ? 'active' : '' }}" href="{{route('contact')}}">Contact Us</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link {{ Request::segment(1) == 'track-orders' ? 'active' : '' }}" href="{{route('tracking')}}">Track Order</a>
                    </li>
                </ul>
                @php
                $wishlistCount = App\Models\Wishlist::where('user_id', Auth::id())->count();
                $userId = Auth::id();
                $guestId = Session::get('guest_id'); 
                if ($userId) {
                    $cartCount = App\Models\Cart::where('user_id', $userId)->count();
                } else {
                    $cartCount = App\Models\Cart::whereNotNull('guest_id')
                            ->where('guest_id', $guestId)
                            ->count();
                }                
                @endphp
                <div class="d-flex gap-4 align-items-center flex-wrap">
                    <div class="d-flex gap-4 align-items-center ">
                        <a class="wishlist-icon text-decoration-none position-relative me-2" href="{{route('wishlist')}}"><img src="{{url('/')}}/webassets/img/wishlist.svg">
                            <span class="number-count wishlistcount">{{$wishlistCount}}</span>
                        </a>
                        <a class="wishlist-icon text-decoration-none position-relative me-2" href="{{route('cart')}}"><img src="{{url('/')}}/webassets/img/addtocart.svg">
                            <span class="number-count cartcount">{{$cartCount}}</span>
                        </a>
                    </div>
                    @if(!Auth::user())
                    <div class="d-flex gap-4 align-items-center">
                        <button class="btn green-btn text-white" data-bs-toggle="modal" data-bs-target="#loginmodal" type="">LOGIN</button>
                        <button class="btn blue-btn text-white " data-bs-toggle="modal" data-bs-target="#signupmodal" type="">SIGN UP</button>
                    </div>
                    @endif
                    @if(Auth::user())
                    <div class="dropdown">
                        <a class=" d-flex align-items-center profile-main gap-2  dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : asset('/dummy.png') }}" class="img-fluid user-profile">
                            <p class="profile-name text-white mb-0 fw-400">{{Auth::user()->name}}</p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="black-grey" href="#">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : asset('/dummy.png') }}" class="img-fluid profile-inner">
                                    <div class="">
                                        <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                        <p class="mb-0 fw-400">{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <ul class="ps-0 list-style-none ">
                                <li><a class="dropdown-item text-grey font-Yantramanav fw-400 py-2 d-flex align-items-center gap-2"  data-bs-toggle="modal" data-bs-target="#editprofile"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                            <path d="M4.10256 4.8718C4.10256 2.18564 6.28821 0 8.97436 0C11.6605 0 13.8462 2.18564 13.8462 4.8718C13.8462 7.55795 11.6605 9.74359 8.97436 9.74359C6.28821 9.74359 4.10256 7.55795 4.10256 4.8718ZM12.0513 11.2821H5.89744C2.64615 11.2821 0 13.9282 0 17.1795C0.00054332 17.9274 0.297878 18.6445 0.826709 19.1733C1.35554 19.7021 2.07263 19.9995 2.82051 20H15.1282C15.8761 19.9995 16.5932 19.7021 17.122 19.1733C17.6508 18.6445 17.9482 17.9274 17.9487 17.1795C17.9487 13.9282 15.3026 11.2821 12.0513 11.2821Z" fill="currentColor" />
                                        </svg>

                                        My Account</a></li>
                                <li><a class="dropdown-item text-grey font-Yantramanav fw-400 py-2 d-flex align-items-center gap-2 me-2" href="{{route('myOrderList')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M16 0C13.796 0 12 1.796 12 4C12 6.204 13.796 8 16 8C18.204 8 20 6.204 20 4C20 1.796 18.204 0 16 0ZM17.948 3.124L15.632 5.44C15.595 5.47783 15.5508 5.50789 15.5021 5.52841C15.4533 5.54894 15.4009 5.55951 15.348 5.55951C15.2951 5.55951 15.2427 5.54894 15.1939 5.52841C15.1452 5.50789 15.101 5.47783 15.064 5.44L14.052 4.428C13.896 4.272 13.896 4.02 14.052 3.864C14.208 3.708 14.464 3.708 14.62 3.864L15.348 4.592L17.38 2.56C17.536 2.404 17.792 2.404 17.948 2.56C18.104 2.716 18.104 2.968 17.948 3.124ZM10 4H6V8.8H10V4ZM7.2 8.4C6.98 8.4 6.8 8.22 6.8 8C6.8 7.78 6.98 7.6 7.2 7.6C7.42 7.6 7.6 7.78 7.6 8C7.6 8.22 7.42 8.4 7.2 8.4ZM8.8 8.4C8.58 8.4 8.4 8.22 8.4 8C8.4 7.78 8.58 7.6 8.8 7.6C9.02 7.6 9.2 7.78 9.2 8C9.2 8.22 9.02 8.4 8.8 8.4ZM2 16H5.2V16.8H2V16Z" fill="currentColor" />
                                            <path d="M11.2 4.00171H10.8V9.20171C10.8 9.42171 10.62 9.60171 10.4 9.60171H5.6C5.38 9.60171 5.2 9.42171 5.2 9.20171V4.00171H0.4C0.18 4.00171 0 4.18171 0 4.40171V19.6017C0 19.8217 0.18 20.0017 0.4 20.0017H15.6C15.82 20.0017 16 19.8217 16 19.6017V8.80171C13.352 8.80171 11.2 6.64971 11.2 4.00171ZM5.6 18.8017H1.6C1.38 18.8017 1.2 18.6217 1.2 18.4017C1.2 18.1817 1.38 18.0017 1.6 18.0017H5.6C5.82 18.0017 6 18.1817 6 18.4017C6 18.6217 5.82 18.8017 5.6 18.8017ZM6 17.2017C6 17.4217 5.82 17.6017 5.6 17.6017H1.6C1.38 17.6017 1.2 17.4217 1.2 17.2017V15.6017C1.2 15.3817 1.38 15.2017 1.6 15.2017H5.6C5.82 15.2017 6 15.3817 6 15.6017V17.2017Z" fill="currentColor" />
                                        </svg>

                                        My Orders</a></li>
                                <li><a class="dropdown-item text-grey font-Yantramanav fw-400 py-2 d-flex align-items-center gap-2" href="{{route('address')}}"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                            <path d="M10.0865 7.27651C11.3791 7.27651 12.4269 6.26677 12.4269 5.02119C12.4269 3.77561 11.3791 2.76587 10.0865 2.76587C8.79394 2.76587 7.74609 3.77561 7.74609 5.02119C7.74609 6.26677 8.79394 7.27651 10.0865 7.27651Z" fill="currentColor" />
                                            <path d="M4.97872 17.4467C5.06383 17.4042 5.10638 17.4042 5.19149 17.4042C5.2766 17.4042 5.3617 17.4042 5.44681 17.4467L10.0851 19.9999L14.7234 17.4467C14.8511 17.3616 15.0213 17.3616 15.1915 17.4467L20.0851 19.6169L16.6809 11.5744L14.4255 10.851C14.383 10.8935 14.383 10.9361 14.3404 10.9786L14.2128 11.234C14.1702 11.3191 14.0851 11.4467 14.0426 11.5318C14 11.6169 13.9574 11.702 13.8723 11.7446C13.8298 11.8297 13.7447 11.9148 13.7021 11.9999C13.6596 12.085 13.617 12.1701 13.5319 12.2127C13.4894 12.2978 13.4043 12.3829 13.3617 12.468C13.3191 12.5531 13.234 12.5957 13.1915 12.6808C13.1489 12.7659 13.0638 12.851 13.0213 12.9361C12.9787 13.0212 12.8936 13.0637 12.8511 13.1488C12.8085 13.234 12.7234 13.2765 12.6809 13.3616C12.6383 13.4467 12.5957 13.4893 12.5106 13.5744C12.4681 13.6595 12.383 13.702 12.3404 13.7871C12.2979 13.8297 12.2553 13.9148 12.1702 13.9574C12.1277 14.0425 12.0426 14.085 12 14.1276C11.9574 14.1701 11.9149 14.2552 11.8723 14.2978C11.8298 14.3403 11.7872 14.4254 11.7021 14.468L11.5745 14.5957C11.5319 14.6382 11.4894 14.7233 11.4043 14.7659L11.2766 14.8935C11.234 14.9361 11.1915 14.9786 11.1489 15.0637L11.0638 15.1488L10.9362 15.2765L10.8511 15.3616L10.7234 15.4893L10.6809 15.5318L10.5957 15.6169L10.5532 15.6595L10.4681 15.7446C10.4255 15.7446 10.4255 15.7871 10.4255 15.7871C10.3404 15.8723 10.2128 15.9148 10.0851 15.9148C9.95745 15.9148 9.82979 15.8723 9.74468 15.7871L9.53191 15.5744L9.48936 15.5318L9.3617 15.4042L9.31915 15.3616L9.19149 15.234L9.10638 15.1488L8.97872 15.0212C8.93617 14.9786 8.89362 14.9361 8.89362 14.8935C8.85106 14.851 8.80851 14.8084 8.76596 14.7233L8.6383 14.5957C8.59575 14.5531 8.55319 14.468 8.46809 14.4254C8.42553 14.3829 8.38298 14.3403 8.34043 14.2552C8.29787 14.2127 8.25532 14.1276 8.17021 14.085C8.12766 14.0425 8.08511 13.9574 8 13.9148C7.95745 13.8723 7.91489 13.7871 7.82979 13.7446C7.78723 13.6595 7.70213 13.6169 7.65957 13.5318C7.61702 13.4467 7.53191 13.4042 7.48936 13.3191C7.44681 13.234 7.3617 13.1914 7.31915 13.1063C7.2766 13.0212 7.19149 12.9786 7.14894 12.8935C7.10638 12.8084 7.02128 12.7233 6.97872 12.6382C6.93617 12.5531 6.85106 12.5106 6.80851 12.4254C6.76596 12.3403 6.68085 12.2552 6.6383 12.1701C6.59574 12.085 6.51064 11.9999 6.46808 11.9574C6.42553 11.8723 6.34043 11.7871 6.29787 11.702C6.25532 11.6169 6.21277 11.5318 6.12766 11.4467C6.08511 11.3616 6 11.2765 5.95745 11.1488C5.91489 11.0637 5.87234 10.9786 5.78723 10.8935C5.74468 10.851 5.74468 10.8084 5.70213 10.7659L3.40426 11.4467L0 19.4893L4.97872 17.4467Z" fill="currentColor" />
                                            <path d="M6.42603 10.0426C6.6388 10.4681 6.89412 10.8511 7.14944 11.1915C8.25582 12.8511 9.48986 14.1702 10.0856 14.766C10.809 14.0426 12.4686 12.2553 13.7452 10.0426C14.7665 8.21277 15.3196 6.55319 15.3196 5.02128C15.3196 2.25532 12.9792 0 10.0856 0C7.19199 0 4.85156 2.25532 4.85156 5.02128C4.85156 6.55319 5.40475 8.25532 6.42603 10.0426ZM10.0856 1.82979C11.9154 1.82979 13.4048 3.2766 13.4048 5.02128C13.4048 6.76596 11.9154 8.21277 10.0856 8.21277C8.25582 8.21277 6.76646 6.76596 6.76646 5.02128C6.76646 3.2766 8.25582 1.82979 10.0856 1.82979Z" fill="currentColor" />
                                        </svg>

                                        My Address</a></li>
                                <!-- <li><a class="dropdown-item text-grey font-Yantramanav fw-400 py-2 d-flex align-items-center gap-2" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M10 0C4.47301 0 0 4.4725 0 10C0 15.5269 4.4725 20 10 20C15.527 20 20 15.5275 20 10C20 4.47301 15.5275 0 10 0ZM9.7041 14.6804C9.13809 14.6804 8.70371 14.2066 8.70371 13.6668C8.70371 13.114 9.15125 12.6533 9.7041 12.6533C10.257 12.6533 10.7176 13.114 10.7176 13.6669C10.7176 14.2065 10.2701 14.6804 9.7041 14.6804ZM11.2046 9.56C10.4807 10.126 10.4675 10.5209 10.4675 11.2054C10.4675 11.4555 10.3359 11.7451 9.6909 11.7451C9.15117 11.7451 8.96695 11.5476 8.96695 10.8632C8.96695 9.73113 9.46715 9.19145 9.84887 8.86238C10.2832 8.49379 11.0204 8.08578 11.0204 7.375C11.0204 6.76945 10.4939 6.47988 9.8357 6.47988C8.49309 6.47988 8.7827 7.49348 8.07184 7.49348C7.71645 7.49348 7.28207 7.25648 7.28207 6.74316C7.28207 6.03238 8.09816 4.9793 9.87519 4.9793C11.56 4.9793 12.6789 5.91391 12.6789 7.15121C12.6789 8.38852 11.56 9.28359 11.2046 9.56Z" fill="currentColor" />
                                        </svg>Help</a>
                                </li> -->
                            </ul>
                            <a class="w-100 d-block text-center green-btn mb-2" href="{{route('userLogout')}}">Logout</a>
                            <a class="w-100 d-block text-center primary-theme text-decoration-underline mb-2 mt-2 text-capitalize" data-bs-toggle="modal" data-bs-target="#changepwd">change Password</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
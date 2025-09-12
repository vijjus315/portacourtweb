<footer class="bgdark-grey pt-5 pb-3">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                <div class="logo-footer">
                    <a class=" py-0" href="#"><img src="{{url('/')}}/webassets/img/logo.svg" /></a>
                    <p class="text-white pt-3 mb-0">PortaCourts is your premier destination for high-quality, customizable sports courts. Whether you're looking for a basketball, tennis, or badminton court, we offer durable and innovative solutions tailored to meet your needs.</p>
                    <!-- <h5 class="primary-theme pt-3">Newsletter</h5>
                        <form id="newsletter-form">
                            @csrf
                            <div class="form-group position-relative newletter w-75 pt-3">
                            <input type="email" name="email" placeholder="Input your email" />
                                <button type="submit" class=" send-btn">Send</button>
                            </div>
                            <span class="text-danger error-message" id="error-email"></span>
                        </form> -->
                </div>
            </div>
            <div class="col-md-6  col-lg-2 mb-3 mb-lg-0">
                <h5 class="primary-theme">Service</h5>
                <ul class="footer-list ps-0 pt-2">
                    <li><a class="text-decoration-none {{ Request::segment(1) == '' ? 'active' : '' }}" href="{{route('home')}}">Home</a></li>
                    <li><a class="text-decoration-none {{ Request::segment(1) == 'about-us' ? 'active' : '' }}" href="{{route('aboutus')}}">About Us </a></li>
                    <li><a class="text-decoration-none {{ Request::segment(1) == 'products' ? 'active' : '' }}" href="{{route('product')}}">Products</a></li>
                    <li><a class="text-decoration-none {{ Request::segment(1) == 'blog' ? 'active' : '' }}" href="{{route('blog')}}">Blog</a></li>
                    <li><a class="text-decoration-none {{ Request::segment(1) == 'contact' ? 'active' : '' }}" href="{{route('contact')}}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-6  col-lg-3 mb-3 mb-lg-0">
                <h5 class="primary-theme">Get In Touch</h5>
                <ul class="footer-list ps-0 pt-2">
                    <li><a class="text-decoration-none d-flex align-items-baseline" href="tel:1+(208) 615-9569">
                            <i class="width-icon fa fa-phone" aria-hidden="true"></i>
                            +1 (800) 272-9717</a></li>
                    <li><a class="text-decoration-none d-flex align-items-baseline" href="mailto:support@portacourts.com">
                            <i class="width-icon fa fa-envelope" aria-hidden="true"></i>
                            support@portacourts.com
                        </a></li>
                    <li><a class="text-decoration-none d-flex align-items-baseline">
                            <i class="width-icon fa fa-map-marker" aria-hidden="true"></i>
                            1002 S Eagle Rd<br>Eagle Idaho 83616</a></li>
                </ul>
            </div>
            <div class="col-md-6  col-lg-3 mb-3 mb-lg-0">
                <h5 class="primary-theme">Quick Links</h5>
                <ul class=" footer-list ps-0 pt-2">
                    <li><a class="text-decoration-none {{ Request::segment(1) == 'term_conditions' ? '' : '' }}" href="{{route('termsconditions')}}">Terms & Conditions</a></li>
                    <li><a class="text-decoration-none" {{ Request::segment(1) == 'privacy_policy' ? '' : '' }}" href="{{route('privacypolicy')}}"> Privacy Policy</a></li>
                    <li><a class="text-decoration-none"  href="{{url('/sitemap.xml')}}">Sitemap</a></li>
                </ul>
                <!-- <h5 class="primary-theme">Follow Us On</h5>
                <ul class="social-list footer-list ps-0 pt-2">
                    <li><a class="text-decoration-none" href="https://www.instagram.com/portacourts"><img src="{{url('/')}}/webassets/img/Instagram.svg"></a></li>
                    <li><a class="text-decoration-none" href="https://www.youtube.com/@PortaCourts"><img src="{{url('/')}}/webassets/img/Youtube.svg"> </a></li>
                    <li><a class="text-decoration-none" href="https://www.facebook.com/profile.php?id=61564220253714"><img src="{{url('/')}}/webassets/img/Facebook.svg"></a></li>
                </ul> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4 mb-3 mb-lg-0">
                <div class="logo-footer">
                    <h5 class="primary-theme">Newsletter</h5>
                    <form id="newsletter-form">
                        @csrf
                        <div class="form-group position-relative newletter w-75 pt-3">
                            <input type="email" name="email" placeholder="Enter your email" />
                            <button type="submit" class=" send-btn">Send</button>
                        </div>
                        <span class="text-danger error-message" id="error-email"></span>
                    </form>
                </div>
            </div>
            <div class="col-md-6  col-xl-2 mb-3 mb-lg-0 d-none d-xl-block">
            </div>
            <div class="col-md-6 col-xl-3 d-none d-xl-block mb-3 mb-lg-0">
            </div>
            <div class="col-md-6  col-xl-3 mb-3 mb-lg-0">
                <h5 class="primary-theme ">Follow Us On</h5>
                <ul class="social-list footer-list ps-0 pt-2">
                    <li><a class="text-decoration-none" href="https://www.instagram.com/portacourts"><img src="{{url('/')}}/webassets/img/Instagram.svg"></a></li>
                    <li><a class="text-decoration-none" href="https://www.youtube.com/@PortaCourts"><img src="{{url('/')}}/webassets/img/Youtube.svg"> </a></li>
                    <li><a class="text-decoration-none" href="https://www.facebook.com/profile.php?id=61564220253714"><img src="{{url('/')}}/webassets/img/Facebook.svg"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 text-white">© 2024 PortaCourts. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
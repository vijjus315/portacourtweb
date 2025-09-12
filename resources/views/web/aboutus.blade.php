@extends('web.utils.master')
@section('content')
@section('head')
<title>About Us</title>
<link rel="canonical" href="https://www.portacourts.com/about-us" />
<meta name="description" content="Learn how PortaCourts' Pickleball & Spikeball courts are made to withstand any environment while maintaining international standards & high performance.">
@endsection
<section class="about-wrapper pt-70 pb-5 ">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-lg-7">
                <div class="banner-text">
                    <h1 class="font-oswald fw-600 text-uppercase"><span class="color-change primary-theme">A</span>BOUT uS</h1>
                    <p class="text-white">Welcome to PortaCourts, where innovation and quality meet to provide you with the best sports flooring solutions. Our courts are designed with a professional surface grain that ensures anti-skid safety, allowing for free and dynamic movement on the court. Tailored specifically for pickleball, our floors meet the required friction coefficient standards, ensuring both performance and safety.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-view pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
                <h2 class="text-capitalize mb-3">Our View</h2>
                <p class="" ><span class="font-36 primary-theme">W</span>elcome to PortaCourts, where innovation and excellence converge to deliver premium sports flooring solutions. Our courts feature a professionally engineered surface grain that guarantees anti-skid safety, enabling unrestricted and dynamic movement. Specifically designed for pickleball, our flooring adheres to <b>industry friction coefficient standards</b>, ensuring optimal performance and safety.</p>
                <p class="" >Our courts are crafted from UV-resistant acrylic materials with superior traction control, ensuring players have the perfect grip, even in extreme weather conditions ranging from <b>-40°C to 80°C</b>. With advanced shock absorption technology and a rebound rate of over 90%, our pickleball courts offer smooth gameplay and consistent ball response.</p>
                <p class="" >For spikeball enthusiasts, we offer premium courts made from a lightweight yet durable mix of raw <b>NBR rubber and PVC</b>, featuring foldable, tool-free assembly. Our Spikeball Courts also come with an adjustable net tensioning system to maintain consistent bounds in each rally. Thus, <b>achieving a net rebound rate of over 90%</b> for quick-paced rallies and fastball returns.</p>
                <p class="" >With a <b>minimum average service life of 3-5 years</b>, and a replacement option of portable assembly rolls for both Pickleball as well as Spike ball there are absolutely no worries of wear and tear even after the long hours of gameplay.            </p>
                <p class=""> Wanna know more about the industry trends, advanced court solutions, and technical know-how behind the designing and manufacturing of professional courts? Chip into our <a href="https://www.portacourts.com/blog">blog</a> section!</p>
            </div>
        </div>
    </div>
</section>
<section class="py-4 abouts-inner-gallery">
    <div class="container">
        <div class="row gallery  h-100">
            <div class="col-md-4">
                <img src="{{url('/')}}/webassets/img/gallery-one.png" alt="Image 1" class="img-fluid h-100 object-fit-cover">
            </div>
            <div class="col-md-4">
                <img src="{{url('/')}}/webassets/img/gallery-long.png" alt="Image 2" class="img-fluid h-100 object-fit-cover">
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <img src="{{url('/')}}/webassets/img/gallery-two.png" alt="Image 3" class="img-fluid h-100 object-fit-cover">
                    </div>
                    <div class="col-md-12">
                        <img src="{{url('/')}}/webassets/img/gallery-three.png" alt="Image 4" class="img-fluid h-100 object-fit-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="about-view py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
                <h2 class="text-capitalize mb-3">Our Story</h2>
                <p><span class="font-36 primary-theme">A</span>t PortaCourts, our journey began with a passion for creating exceptional sports experiences. As avid sports enthusiasts, we recognized the importance of high-quality, durable courts that enhance performance while ensuring safety and longevity. Driven by this vision, we set out to revolutionize the sports flooring industry with innovative designs and state-of-the-art technology.</p>
                <p>With a focus on sustainability and cost-effectiveness, our engineering team developed a super stable structure capable of withstanding extreme temperatures, making our floors suitable for all environments. Our advanced manufacturing processes ensure precision and perfection in every court we produce, from minimal splicing errors to flawless parquet alignments.</p>
                <p>Over the years, PortaCourts has grown from a small team of innovators to a leading provider of premium sports flooring solutions. We remain committed to our core values of quality, safety, and customer satisfaction, continuously striving to deliver the best in sports court technology.</p>
                <p>Join us on our journey as we continue to push the boundaries of what’s possible in sports flooring, helping athletes and enthusiasts unlock their full potential with every game.</p>
            </div>
        </div>
    </div>
</section>

@include('web.partial.testimonails')
<section class="bgdark-grey py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="shipping-inner">
                    <img src="{{url('/')}}/webassets/img/shipping.svg">
                    <div class="">
                        <h4 class="fw-500 text-white">FREE SHIPPING</h4>
                        <p class="f18 mb-0 text-white">Free shipping within the continental US.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="shipping-inner">
                    <img src="{{url('/')}}/webassets/img/return.svg">
                    <div class="">
                        <h4 class="fw-500 text-white">ESTIMATED PRODUCTION</h4>
                        <p class="f18 mb-0 text-white">7 - 10 Days</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="shipping-inner">
                    <img src="{{url('/')}}/webassets/img/return.svg">
                    <div class="">
                        <h4 class="fw-500 text-white">ESTIMATED SHIPPING TIME</h4>
                        <p class="f18 mb-0 text-white">35 - 45 Days</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="shipping-inner">
                    <img src="{{url('/')}}/webassets/img/secure.svg">
                    <div class="">
                        <h4 class="fw-500 text-white">SECURE PAYMENT</h4>
                        <p class="f18 mb-0 text-white">100% Secure Payment </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3" >
             <div class="col-12 text-center">
                <h4 class="text-white mb-0">Costs might vary outside the continental US.</h4>
             </div>
        </div>
    </div>
</section>
@include('web.partial.blog')
@endsection
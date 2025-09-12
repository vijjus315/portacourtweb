@extends('web.utils.master')
@section('content')
@section('head')
<title>Contact PortaCourts</title>
<meta name="description" content="Get in touch with PortaCourts for inquiries, support, or feedback. Reach us via phone, email, or our easy contact form. We're here to help!">
<link rel="canonical" href="https://www.portacourts.com/contact" />
@endsection
<section class="contact-wrapper  ">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-lg-7">
                <div class="banner-text">
                    <h1 class="font-oswald fw-600 text-uppercase"><span class="color-change primary-theme">C</span>ontact uS</h1>
                    <p class="text-white">We’d love to hear from you! Whether you have questions about our products, need assistance with a project, or want to provide feedback, the PortaCourts team is here to help. Reach out to us using the information below, and we’ll get back to you as soon as possible.We’d love to hear from you! Whether you have questions about our products, need assistance with a project, or want to provide feedback, the PortaCourts team is here to help. Reach out to us using the information below, and we’ll get back to you as soon as possible.</p>
                    <!-- <button class="green-btn border-0">Shop Now</button> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-wrapper product-contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 px-0">
                <div class="product-inner  white-green position-relative">
                    <h2 class="d-flex align-items-center">
                        01<span class="line-box"></span>
                    </h2>
                    <h4 class="text-uppercase fw-600">Visit Us</h4>
                    <p class="f20 fw-400">1002 S Eagle Rd Eagle Idaho 83616</p>
                </div>
            </div>
            <div class="col-lg-4 px-0">
                <div class="product-inner green-white position-relative">
                    <h2 class="d-flex align-items-center">
                        02<span class="line-box"></span>
                    </h2>
                    <h4 class="text-uppercase fw-600">Call us</h4>
                    <p class="text-white f20 fw-400">+1 (800) 272-9717</p>
                </div>
            </div>
            <div class="col-lg-4 px-0">
                <div class="product-inner black-green position-relative">
                    <h2 class="d-flex align-items-center">
                        03<span class="line-box"></span>
                    </h2>
                    <h4 class="text-uppercase fw-600">Contact Us</h4>
                    <p class="text-white f20 fw-400">support@portacourts.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-4 ">
                <div class="border-line"></div>
                <h2 class="text-capitalize">Get In Touch</h2>
            </div>
            <div class="col-8 text-end">
                <img src="{{url('/')}}/webassets/img/getintouch.png" alt="get-in-contact" class="get-in-contact">
            </div>
        </div>
    </div>
</section>
<section class="get-intouch position-relative">
    <div class="container">
        <div class="sign-up-form">
            <div class="form-contact">
                <form id="contactForm">
                @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">First Name</label>
                                <input type="text" name="first_name" placeholder="Enter here" class="contact-input form-control text-white">
                                <span class="text-danger error-message" id="error-first_name"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Your Subjects</label>
                                <input type="text" name="subjects" placeholder="Enter here" class="contact-input form-control text-white">
                                <span class="text-danger error-message" id="error-subjects"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Email</label>
                                <input type="text" name="email" placeholder="Enter here" class="contact-input form-control text-white">
                                <span class="text-danger error-message" id="error-email"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Phone Number</label>
                                <input type="text" name="phone" placeholder="Enter here" class="contact-input form-control text-white">
                                <span class="text-danger error-message" id="error-phone"></span>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Your message</label>
                                <textarea name="message" placeholder="Enter here" class="contact-input form-control text-white"></textarea>
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
    <div class="container-fluid px-0">
        <div class="map-contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2908.427177430322!2d-116.35415512455977!3d43.6951017791187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54aefb91b4bfa6c9%3A0xa74c9bcb24c23ed7!2s1002%20S%20Eagle%20Rd%2C%20Eagle%2C%20ID%2083616%2C%20USA!5e0!3m2!1sen!2sin!4v1721215764336!5m2!1sen!2sin" width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

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
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
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
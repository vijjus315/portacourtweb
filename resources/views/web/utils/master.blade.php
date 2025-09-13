<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @viteReactRefresh
    <!-- Open Graph Tags -->
    <meta property="og:title" content="PortaCourts - Custom Sports Courts">
    <meta property="og:description" content="Get premium custom courts for sports like tennis, spike ball, and pickleball at PortaCourts.">
    <meta property="og:image" content="https://portacourts.com/images/court-preview.jpg">
    <meta property="og:url" content="https://portacourts.com/">
    <meta property="og:type" content="website">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PortaCourts - Custom Sports Courts">
    <meta name="twitter:description" content="Get premium custom courts for sports like tennis, spike ball, and pickleball at PortaCourts.">
    <meta name="twitter:image" content="https://portacourts.com/images/court-preview.jpg">
    <meta name="twitter:site" content="@PortaCourts">
    <meta name="wot-verification" content="da9dd471b2a65d6080c5"/>
    
    <link rel="icon" type="image/x-icon" href="{{url('/')}}/webassets/img/favicon.svg">
    <script src="{{url('/')}}/webassets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{url('/')}}/webassets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/webassets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="{{url('/')}}/webassets/css/owl.theme.default.css" rel="stylesheet">
    <link href="{{url('/')}}/webassets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/webassets/css/global.css" rel="stylesheet">
    <link href="{{url('/')}}/webassets/css/responsive.css" rel="stylesheet">
    <link href="{{url('/')}}/webassets/css/style.css" rel="stylesheet">    
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W3WXDVDC');
    </script>
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1262169568255634');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1262169568255634&ev=PageView&noscript=1" /></noscript>
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="LKoJIViiGBcRpq/k5TwNWA" async></script>

    {{-- React Fast Refresh preamble for Vite dev server --}}
    @viteReactRefresh

    @yield('head')

</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3WXDVDC"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @include('web.utils.header')
    @yield('content')
    @include('web.partial.modals')
    @include('web.utils.footer')

    <script src="{{url('/')}}/webassets/js/popper.min.js"></script>
    <script src="{{url('/')}}/webassets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/webassets/js/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
    <script>
        $('#owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: true,
            items: 1,
            navText: ["<img src='{{url('/')}}/webassets/img/left-arrow.svg' class='left-arrow'/>", "<img src='{{url('/')}}/webassets/img/right-arrow.svg' class='right-arrow'/>"]

        })
        // -----Country Code Selection
        $("#mobile_code").intlTelInput({
            initialCountry: "gb",
            separateDialCode: true,
            // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.addwishlist').on('click', function(e) {
                e.preventDefault();

                var $this = $(this);
                var productId = $this.data('product-id');
                var inWishlist = $this.data('in-wishlist');
                var $icon = $this.find('img');

                $.ajax({
                    url: '{{ route("wishlist.add") }}',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.action == 'added') {
                                toastr.success(response.message);
                                $icon.attr('src', '{{ url("/") }}/webassets/img/green-wishlist-bg.svg');
                                $this.data('in-wishlist', true);
                                $('.wishlistcount').text(response.count)
                            } else if (response.action == 'removed') {
                                toastr.success(response.message);
                                $icon.attr('src', '{{ url("/") }}/webassets/img/unfillwishlist.svg');
                                $this.data('in-wishlist', false);
                                $('.wishlistcount').html(response.count)
                            }
                        } else {
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
        $(document).ready(function() {
            // Add to cart
            $('.add-to-cart-btn').on('click', function(e) {
                e.preventDefault();

                const product_id = $(this).data('product-id');
                const quantity = $(this).data('quantity') || 1;
                const variant_id = $(this).data('variant-id');

                $.ajax({
                    url: '{{ route("cart.add") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: product_id,
                        quantity: quantity,
                        variant_id: variant_id
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $('.cartcount').text(response.count)
                        } else {
                            toastr.error(response.message);
                            // toastr.error('An error occurred. Please try again.');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });

        });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Session management utilities
        function isAuthenticated() {
            return !!localStorage.getItem('auth_token');
        }

        function getUserData() {
            const userData = localStorage.getItem('user_data');
            return userData ? JSON.parse(userData) : null;
        }

        function clearAuthData() {
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_data');
        }

        function updateHeaderVisibility() {
            const isLoggedIn = isAuthenticated();
            const userData = getUserData();
            
            // Hide/show login/signup buttons
            const loginSignupDiv = document.querySelector('.d-flex.gap-4.align-items-center:has(.btn.green-btn)');
            const profileDropdown = document.querySelector('.dropdown:has(.profile-main)');
            
            if (loginSignupDiv) {
                loginSignupDiv.style.display = isLoggedIn ? 'none' : 'flex';
            }
            
            if (profileDropdown) {
                profileDropdown.style.display = isLoggedIn ? 'block' : 'none';
                
                if (isLoggedIn && userData) {
                    // Update user profile data
                    const profileImg = profileDropdown.querySelector('.user-profile');
                    const profileName = profileDropdown.querySelector('.profile-name');
                    const profileInnerImg = profileDropdown.querySelector('.profile-inner');
                    const profileInnerName = profileDropdown.querySelector('.profile-inner + div h4');
                    const profileInnerEmail = profileDropdown.querySelector('.profile-inner + div p');
                    
                    if (profileImg) {
                        profileImg.src = userData.profile || '{{ url("/") }}/dummy.png';
                    }
                    if (profileName) {
                        profileName.textContent = userData.name || 'User';
                    }
                    if (profileInnerImg) {
                        profileInnerImg.src = userData.profile || '{{ url("/") }}/dummy.png';
                    }
                    if (profileInnerName) {
                        profileInnerName.textContent = userData.name || 'User';
                    }
                    if (profileInnerEmail) {
                        profileInnerEmail.textContent = userData.email || '';
                    }
                }
            }
        }

        function handleLogout() {
            clearAuthData();
            updateHeaderVisibility();
            window.dispatchEvent(new CustomEvent('userLoggedOut'));
            window.location.href = '{{ route("home") }}';
        }

        // Initialize header visibility on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateHeaderVisibility();
            
            // Listen for login events
            window.addEventListener('userLoggedIn', updateHeaderVisibility);
            window.addEventListener('userLoggedOut', updateHeaderVisibility);
            
            // Add logout functionality to existing logout button
            const logoutBtn = document.querySelector('a[href="{{route("userLogout")}}"]');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    handleLogout();
                });
            }
        });

        $(document).ready(function() {
            // Handle login form submission
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                clearErrors('login');

                $.ajax({
                    url: 'https://www.portacourts.com:4235/api/v1/auth/login',
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    success: function(response) {
                        if (response.success === true) {
                            // Store token and user data in localStorage
                            if (response.body && response.body.token) {
                                localStorage.setItem('auth_token', response.body.token);
                                localStorage.setItem('user_data', JSON.stringify(response.body.user));
                            }

                            if (response.body && response.body.user && response.body.user.is_verify === 1) {
                                // User is verified, redirect to home page
                                $('#loginmodal').modal('hide');
                                toastr.success(response.message || 'Logged in successfully');
                                
                                // Dispatch custom event for header update
                                window.dispatchEvent(new CustomEvent('userLoggedIn'));
                                
                                window.location.href = '{{ route("home") }}'; // Redirect to dashboard
                            } else {
                                // User needs OTP verification
                                $('#loginmodal').modal('hide');
                                $('#emailDisplay').text(response.body?.user?.email || response.email);
                                $('#verifyOtpEmail').val(response.body?.user?.email || response.email);
                                $('#verifyemail').modal('show');
                                toastr.success(response.message)
                                
                                // Dispatch custom event for header update
                                window.dispatchEvent(new CustomEvent('userLoggedIn'));
                            }
                        } else {
                            if (response.message) {
                                toastr.error(response.message)
                            } else {
                                displayErrors(response.errors, 'login');
                            }
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            displayErrors(xhr.responseJSON.errors, 'login');
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    }
                });
            });

            // Handle signup form submission
            $('#signupForm').on('submit', function(e) {
                e.preventDefault();
                clearErrors('signup');

                $.ajax({
                    url: '{{ route("signup.store") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#signupmodal').modal('hide');
                            $('#emailDisplay').text(response.email);
                            $('#verifyOtpEmail').val(response.email);
                            $('#verifyemail').modal('show');
                            toastr.success(response.message);
                        } else {
                            displayErrors(response.errors, 'signup');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });

            // Handle OTP verification form submission
            $('#verifyOtpForm').on('submit', function(e) {
                e.preventDefault();
                clearErrors('verifyOtp');

                $.ajax({
                    url: '{{ route("otp.verify") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = '{{ route("home") }}';
                        } else {
                            if (response.errors) {
                                displayErrors(response.errors, 'verifyOtp');
                            } else if (response.message) {
                                $('#error-otp').text(response.message);
                            }
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });

            // Handle OTP resend button click
            $('#resendOtpBtn').on('click', function() {
                var email = $('#verifyOtpEmail').val();
                $.ajax({
                    url: '{{ route("otp.resend") }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: email
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('OTP resent successfully');
                        } else {
                            toastr.error('Failed to resend OTP');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });

            // Function to display errors
            function displayErrors(errors, formType) {
                $.each(errors, function(key, value) {
                    $('#' + formType + '-error-' + key).text(value[0]);
                });
            }

            // Function to clear errors
            function clearErrors(formType) {
                $('.error-message').text('');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Clear errors function
            function clearErrors() {
                $('.error-message').text('');
            }

            // Display errors function
            function displayErrors(errors, prefix) {
                $.each(errors, function(key, value) {
                    $('#' + prefix + '-error-' + key).text(value[0]);
                });
            }

            // Forgot Password form submission
            $('#forgotPasswordForm').on('submit', function(e) {
                e.preventDefault();
                clearErrors();

                $.ajax({
                    url: '{{ route("password.email") }}', // Route to handle sending the OTP
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#forgotmodal').modal('hide');
                            $('#emailDisplay').text(response.email);
                            $('#otpEmail').val(response.email);
                            $('#forgotverifyOtpModal').modal('show');
                            toastr.success(response.message);
                        } else {
                            displayErrors(response.errors, 'forgot');
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Verify OTP form submission
            $('#forgotverifyOtpForm').on('submit', function(e) {
                e.preventDefault();
                clearErrors();

                $.ajax({
                    url: '{{ route("password.verifyOtp") }}', // Route to verify the OTP
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#forgotverifyOtpModal').modal('hide');
                            $('#resetEmail').val(response.email);
                            $('#resetPasswordModal').modal('show');
                            toastr.success(response.message);
                        } else {
                            if (response.errors) {
                                displayErrors(response.errors, 'forgotverify');
                            } else if (response.message) {
                                $('#forgotverify-error-otp').text(response.message);
                            }
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Reset password form submission
            $('#resetPasswordForm').on('submit', function(e) {
                e.preventDefault();
                clearErrors();

                $.ajax({
                    url: '{{ route("password.update") }}', // Route to update the password
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#resetPasswordModal').modal('hide');
                            toastr.success(response.message);
                            window.location.href = '{{ route("home") }}'; // Redirect to home page
                        } else {
                            displayErrors(response.errors, 'reset');
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#editProfileForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: '{{ route("profile.update") }}', // Replace with your route to update the profile
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#editprofile').modal('hide');
                            toastr.success(response.message);
                            location.reload();
                            // Optionally, update the profile info on the page without a refresh
                        } else {
                            // Handle validation errors
                            $.each(response.errors, function(key, value) {
                                $('#' + key + '-error').text(value[0]);
                            });
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Handle profile image preview
            $('input[name="profile"]').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#frame').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#changePasswordForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: '{{ route("changepassword.update") }}', // Replace with your route to update the password
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#changepwd').modal('hide');
                            toastr.success(response.message);
                        } else {
                            $('.error-message').text(''); // Clear previous error messages
                            if (response.errors) {
                                $.each(response.errors, function(key, value) {
                                    $('#' + key + '-error').text(value[0]);
                                });
                            } else if (response.message) {
                                $('#old_password-error').text(response.message);
                            }
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Toggle password visibility
            // $('.icon-eye').on('click', function() {
            //     let input = $(this).prev('input');
            //     let type = input.attr('type') === 'password' ? 'text' : 'password';
            //     input.attr('type', type);
            //     $(this).toggleClass('fa-eye fa-eye-slash');
            // });
            $(document).on('click', '.toggle-password', function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $(this).parent().parent().find('.password-field');
                input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input-field');

            otpInputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length === input.maxLength) {
                        const nextInput = otpInputs[index + 1];
                        if (nextInput) {
                            nextInput.focus();
                        }
                    }
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value === '') {
                        const prevInput = otpInputs[index - 1];
                        if (prevInput) {
                            prevInput.focus();
                        }
                    }
                });

                input.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text').split('');
                    otpInputs.forEach((input, i) => {
                        if (pasteData[i]) {
                            input.value = pasteData[i];
                            const nextInput = otpInputs[i + 1];
                            if (nextInput) {
                                nextInput.focus();
                            }
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.newotp-input-field');

            otpInputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length === input.maxLength) {
                        const nextInput = otpInputs[index + 1];
                        if (nextInput) {
                            nextInput.focus();
                        }
                    }
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value === '') {
                        const prevInput = otpInputs[index - 1];
                        if (prevInput) {
                            prevInput.focus();
                        }
                    }
                });

                input.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text').split('');
                    otpInputs.forEach((input, i) => {
                        if (pasteData[i]) {
                            input.value = pasteData[i];
                            const nextInput = otpInputs[i + 1];
                            if (nextInput) {
                                nextInput.focus();
                            }
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#newsletter-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route("subscribe") }}', // Route to verify the OTP
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('.error-message').text(''); // Clear previous error messages
                        if (response.success) {
                            toastr.success(response.message);
                            $('#newsletter-form')[0].reset();
                        } else {
                            if (response.errors) {
                                displayErrors(response.errors);
                            } else if (response.message) {
                                $('#error-email').text(response.message);
                            }
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            function displayErrors(errors) {
                $.each(errors, function(key, value) {
                    $('#error-' + key).text(value[0]);
                });
            }
        });
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-441SCBV11L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-441SCBV11L');
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if the video has already been shown in this session
        if (!sessionStorage.getItem('introVideoShown')) {
            // Show the minimized video if it's the user's first visit
            document.getElementById('minimized-video').style.display = 'block';
            sessionStorage.setItem('introVideoShown', 'true'); // Set session storage flag
        }

        // When the modal is closed, show the minimized video
        $('#introVideoModal').on('hidden.bs.modal', function() {
            document.getElementById('introVideo').pause(); // Pause the video in modal
            document.getElementById('minimized-video').style.display = 'block'; // Show minimized video
        });

        // Click event to maximize video from minimized thumbnail
        document.getElementById('minimized-video').addEventListener('click', function(event) {
            // Prevent the modal from showing when clicking on the close button
            if (event.target.classList.contains('close-btn')) return;
            $('#introVideoModal').modal('show'); // Show modal again
            this.style.display = 'none'; // Hide minimized video
        });

        // Event listener for close button on minimized video
        document.querySelector('#minimized-video .close-btn').addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent triggering the click event on the minimized video
            document.getElementById('minimized-video').style.display = 'none'; // Hide minimized video
        });

        // Stop the video from playing when the modal is closed
        $('#introVideoModal').on('hide.bs.modal', function() {
            var video = document.getElementById('introVideo');
            video.pause();
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {

    $('#customSizeForm input, #customSizeForm textarea').on('input', function() {
        var name = $(this).attr('name');
        $("#cerror-" + name).text('');
    });
    
    // Validate the form
    $('#customSizeForm').validate({
        rules: {
            full_name: {
                required: true,
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
            custom_size: {
                required: true
            },
            address: {
                required: true
            },
        },
        messages: {
            full_name: {
                required: "Full name is required",
                minlength: "Full name must be at least 2 characters long"
            },
            email: {
                required: "Email is required",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Phone number is required",
                // digits: "Please enter a valid phone number",
                minlength: "Phone number must be at least 10 digits",
                maxlength: "Phone number must not exceed 15 digits"
            },
            custom_size: {
                required: "Custom size are required"
            },
            address: {
                required: "Address is required",
                // minlength: "Message must be at least 10 characters long"
            }
        },
        errorPlacement: function(error, element) {
            var name = element.attr("name");
            $("#cerror-" + name).text(error.text());
        },
        submitHandler: function(form) {
            // Clear previous errors
            $('.error-message').text('');

            const $submitBtn = $('#submitCustomSizeBtn');
            const $spinner = $submitBtn.find('.spinner-border');
            const $btnText = $submitBtn.find('.btn-text');

            // Disable button and show loader
            $submitBtn.prop('disabled', true);
            $spinner.removeClass('d-none');
            $btnText.text('Submitting...');

            // ✅ Set full international phone number
            const iti = window.intlTelInputGlobals.getInstance(phoneInput);
            const fullPhoneNumber = iti.getNumber(); // E.g., +91xxxxxxxxxx
            $('#phone').val(fullPhoneNumber); // Replace input value with full number
            
            // Submit the form via AJAX
            $.ajax({
                url: '{{ route("customsize.submit") }}', // Replace with your route
                method: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    $submitBtn.prop('disabled', false);
                    $spinner.addClass('d-none');
                    $btnText.text('Submit');
                    if (response.success) {
                        // alert('Message sent successfully');
                        toastr.success("Thank you for your request!<br>Our team has received your custom court details. We'll review your requirements and get in touch with you shortly to discuss the next steps.");                       
                                // Reset the form
                        $('#customSizeForm')[0].reset();
                        $('#requestcustomsizebtn').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    } else {
                        // Display errors
                        displayErrors(response.errors);
                    }
                },
                error: function() {
                    $submitBtn.prop('disabled', false);
                    $spinner.addClass('d-none');
                    $btnText.text('Submit');
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAjLhCmLl2_SMHK8cNUuRkjfp4cOmD5jQ&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        let autocomplete;
        function initAutocomplete() {
            const input = document.getElementById('autocomplete');
            autocomplete = new google.maps.places.Autocomplete(input, { 
                types: ['geocode'],
                componentRestrictions: { country: 'in' }
            });

            autocomplete.addListener('place_changed', () => {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    console.log("No location details available for input: '" + place.name + "'");
                    return;
                }
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });
        }

        // Initialize Places API after modal is shown
        document.getElementById('requestcustomsizebtn').addEventListener('shown.bs.modal', function () {
            // Reinitialize autocomplete when modal is shown
            initAutocomplete();
        });
    </script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    const phoneInput = document.querySelector("#phone");
if (phoneInput) {
    window.intlTelInput(phoneInput, {
        initialCountry: "in", // or auto for auto-detect
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        separateDialCode: true,
    });
}
</script>
    @yield('scripts')
</body>

</html>
<!-- Login Modal now rendered by React component in resources/js/components/LoginModal.jsx -->

<!-- Signup Modal -->
<div class="modal fade" id="signupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="staticBackdropLabel">Welcome to Portacourts</h5>
                <button type="button" class="btn-closed border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close"><img src="{{url('/')}}/webassets/img/cross.svg"></button>
            </div>
            <div class="modal-body pt-0">
                <h1 class="font-oswald pb-4">Sign Up</h1>
                <form id="signupForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="pb-2">Name</label>
                                <input type="text" class="form-control common-input" name="name" placeholder="Enter Name">
                                <span class="text-danger error-message" id="signup-error-name"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="pb-2">Email</label>
                                <input type="email" class="form-control common-input" name="email" placeholder="Email address">
                                <span class="text-danger error-message" id="signup-error-email"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="pb-2">Mobile No.</label>
                        <input type="text" class="form-control common-input" name="mobile" placeholder="Enter here" id="mobile_code" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' maxlength="16">
                        <span class="text-danger error-message" id="signup-error-mobile"></span>
                    </div>
                    <div class="form-group mb-4">
                        <label class="pb-2">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control common-input password-field" name="password" placeholder="Password">
                            <span class="text-danger error-message" id="signup-error-password"></span>
                            <div class="icon-eye">
                                <i class="fa fa-eye toggle-password" aria-hidden="true" toggle="#password-field"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="pb-2">Confirm Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control common-input password-field" name="password_confirmation" placeholder="Confirm Password">
                            <span class="text-danger error-message" id="signup-error-password_confirmation"></span>
                            <div class="icon-eye">
                                <i class="fa fa-eye toggle-password" aria-hidden="true" toggle="#password-field"></i>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox">
                            <label class="checkbox-inline d-flex gap-2 align-items-center" for="remember">
                                <input name="remember" id="remember" type="checkbox" class="check_form">I accept the <a href="{{route('termsconditions')}}" class="text-decoration-underline">Terms and Conditions</a>
                            </label>
                        </div>
                    <div class="pt-4 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Sign Up</button>
                    </div>
                    <div class="text-center">
                        <p class="font-Yantramanav light-grey"> Already have any account? <a class="theme_color text-decoration-underline fw-500" href="#" data-bs-toggle="modal" data-bs-target="#loginmodal" >Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Verify Email Modal -->
<!-- <div class="modal fade" id="verifyemail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close"><img src="{{url('/')}}/webassets/img/cross.svg"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{url('/')}}/webassets/img/resetpwd.png" class="img-fluid">
                    <h1 class="font-oswald pb-1">Verify Email</h1>
                    <p>We have sent an email with verification information to <span id="emailDisplay"></span></p>
                </div>
                <form id="verifyOtpForm">
                    @csrf
                    <input type="hidden" id="verifyOtpEmail" name="email">
                    <div class="form-group otp-input">
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                    </div>
                    <div class="pt-4 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Submit</button>
                        <span class="text-danger error-message" id="error-otp"></span>
                    </div>
                    <a class="primary-theme font-Yantramanav text-decoration-underline fw-400 text-center mt-2 d-flex mx-auto justify-content-center align-items-center" id="resendOtpBtn">Resend Code</a>
                </form>
            </div>
        </div>
    </div>
</div> -->


<div class="modal fade " id="verifyemail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close"><img src="{{url('/')}}/webassets/img/cross.svg"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{url('/')}}/webassets/img/resetpwd.png" class="img-fluid">
                    <h1 class="font-oswald pb-1">Verify Email</h1>
                    <p>We have sent an email with verification information to <span id="emailDisplay"></span></p>
                </div>
                <form id="verifyOtpForm">
                    @csrf
                    <input type="hidden" id="verifyOtpEmail" name="email">
                    <div class="form-group otp-input">
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control otp-input-field" name="otp[]" maxlength="1" required>
                    </div>
                    <div class="pt-4 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Submit</button>
                        <span class="text-danger error-message" id="error-otp"></span>
                    </div>
                    <a class="primary-theme font-Yantramanav text-decoration-underline fw-400 text-center mt-2 d-flex mx-auto justify-content-center align-items-center" id="resendOtpBtn">Resend Code</a>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/') }}/webassets/img/cross.svg">
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{ url('/') }}/webassets/img/forgotpwd.png" class="img-fluid">
                    <h1 class="font-oswald pb-3">Forgot Password</h1>
                    <p>Enter the email you used to create your account so we can send you a link for resetting your password</p>
                </div>
                <form id="forgotPasswordForm">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="pb-2">Email</label>
                        <input type="email" class="form-control common-input" name="email" placeholder="Email address">
                        <span class="text-danger error-message" id="forgot-error-email"></span>
                    </div>
                    <div class="pt-3 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Verify OTP Modal -->
<!-- <div class="modal fade" id="forgotverifyOtpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/') }}/webassets/img/cross.svg">
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{ url('/') }}/webassets/img/resetpwd.png" class="img-fluid">
                    <h1 class="font-oswald pb-1">Verify Email</h1>
                    <p>We have sent an email with OTP to <span id="emailDisplay"></span></p>
                </div>
                <form id="forgotverifyOtpForm">
                    @csrf
                    <input type="hidden" id="otpEmail" name="email">
                    <div class="form-group mb-4">
                        <label class="pb-2">OTP</label>
                        <input type="text" class="form-control common-input" name="otp" placeholder="Enter OTP">
                        <span class="text-danger error-message" id="forgotverify-error-otp"></span>
                    </div>
                    <div class="pt-3 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Verify OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->


<div class="modal fade " id="forgotverifyOtpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close"><img src="{{url('/')}}/webassets/img/cross.svg"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{url('/')}}/webassets/img/resetpwd.png" class="img-fluid">
                    <h1 class="font-oswald pb-1">Verify Email</h1>
                    <p>We have sent an email with verification information to <span id="emailDisplay"></span></p>
                </div>
                <form id="forgotverifyOtpForm">
                    @csrf
                    <input type="hidden" id="otpEmail" name="email">
                    <div class="form-group otp-input">
                        <input type="text" class="form-control newotp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control newotp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control newotp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control newotp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control newotp-input-field" name="otp[]" maxlength="1" required>
                        <input type="text" class="form-control newotp-input-field" name="otp[]" maxlength="1" required>
                    </div>
                    <div class="pt-4 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Submit</button>
                        <span class="text-danger error-message" id="forgotverify-error-otp"></span>
                    </div>
                    <a class="primary-theme font-Yantramanav text-decoration-underline fw-400 text-center mt-2 d-flex mx-auto justify-content-center align-items-center" id="resendOtpBtn">Resend Code</a>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- 
<div class="modal fade" id="forgotverifyOtpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/') }}/webassets/img/cross.svg">
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{ url('/') }}/webassets/img/resetpwd.png" class="img-fluid">
                    <h1 class="font-oswald pb-1">Verify Email</h1>
                    <p>We have sent an email with OTP to <span id="emailDisplay"></span></p>
                </div>
                <form id="forgotverifyOtpForm">
                    @csrf
                    <input type="hidden" id="otpEmail" name="email">
                    <div class="form-group otp-input">
                        <label class="pb-2">OTP</label>
                        <input type="text" class="form-control common-input newotp-input-field" name="fotp[]" maxlength="1" required>
                        <input type="text" class="form-control common-input newotp-input-field" name="fotp[]" maxlength="1" required>
                        <input type="text" class="form-control common-input newotp-input-field" name="fotp[]" maxlength="1" required>
                        <input type="text" class="form-control common-input newotp-input-field" name="fotp[]" maxlength="1" required>
                        <input type="text" class="form-control common-input newotp-input-field" name="fotp[]" maxlength="1" required>
                        <input type="text" class="form-control common-input newotp-input-field" name="fotp[]" maxlength="1" required>
                        <span class="text-danger error-message" id="forgotverify-error-otp"></span>
                    </div>
                    <div class="pt-3 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Verify OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->



<!-- Successfull modal -->
<div class="modal fade" id="successfullmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/') }}/webassets/img/cross.svg">
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{ url('/') }}/webassets/img/successfull.png" class="img-fluid">
                    <h1 class="font-oswald pb-3">Sucessfull</h1>
                    <p class="fw-600 f20 thank-text">Your password has been successfully reset.</p>
                    <p class="fw-600 f20 thank-text">You can now log in with your new password.</p>
                </div>
                <div class="pt-3 pb-3">
                    <button type="submit" class="btn green-btn w-100 box-shadow">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Reset Password Modal -->
<div class="modal fade" id="resetPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-header border-0">
                <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/') }}/webassets/img/cross.svg">
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center">
                    <img src="{{ url('/') }}/webassets/img/resetpwd.png" class="img-fluid">
                    <h1 class="font-oswald pb-2">Reset Password</h1>
                    <p>Choose a new password for your account</p>
                </div>
                <form id="resetPasswordForm">
                    @csrf
                    <input type="hidden" id="resetEmail" name="email">
                    <div class="form-group mb-3">
                        <label class="pb-2">New Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control common-input password-field" name="password" placeholder="Password">
                            <div class="icon-eye">
                                <i class="fa fa-eye toggle-password" aria-hidden="true" toggle="#password-field"></i>
                            </div>
                            <span class="text-danger error-message" id="reset-error-password"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="pb-2">Confirm New Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control common-input password-field" name="password_confirmation" placeholder="Password">
                            <div class="icon-eye">
                                <i class="fa fa-eye toggle-password" aria-hidden="true" toggle="#password-field"></i>
                            </div>
                            <span class="text-danger error-message" id="reset-error-password_confirmation"></span>
                        </div>
                    </div>
                    <div class="pt-4 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(Auth::user())
<div class="modal fade" id="editprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-body pt-0">
                <div class="d-flex align-items-center justify-content-between gap-2 pb-2">
                    <h1 class="font-oswald mb-0">My Account</h1>
                    <button type="button" class="btn-closed border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{url('/')}}/webassets/img/cross.svg">
                    </button>
                </div>
                <form id="editProfileForm">
                    @csrf
                    <div class="profile-upload mb-2 gym-profile-upload">
                        <div class="position-relative">
                            <div>
                                <img id="frame" class="preview-after-gym" src="{{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : asset('/dummy.png') }}">
                            </div>
                            <div class="edit-pentool">
                                <div class="position-relative">
                                    <div>
                                        <img src="{{url('/')}}/webassets/img/upload-icon.svg" class="">
                                    </div>
                                    <input type="file" name="profile" accept="image/*" class="input-upload-gym">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="pb-2">Name</label>
                        <input type="text" class="form-control common-input" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group mb-4">
                        <label class="pb-2">Email</label>
                        <input type="email" class="form-control common-input" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group mb-4">
                        <label class="pb-2">Mobile No.</label>
                        <div class="position-relative">
                            <input type="text" class="form-control common-input" name="mobile" value="{{Auth::user()->phone_no}}">
                        </div>
                    </div>
                    <div class="pt-4 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Update</button>
                    </div>
                    <div class="text-center">
                        <!-- <p class="font-Yantramanav light-grey">Already have an account? <a class="theme_color" href="">Sign In</a></p> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changepwd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-width">
            <div class="modal-body pt-0">
                <div class="d-flex align-items-center justify-content-between gap-2 pb-2">
                    <h1 class="font-oswald mb-0">Change Password</h1>
                    <button type="button" class="btn-closed border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{url('/')}}/webassets/img/cross.svg">
                    </button>
                </div>
                <form id="changePasswordForm">
                    @csrf
                    <div class="text-center py-3">
                        <img src="{{url('/')}}/webassets/img/resetpwd.png">
                    </div>
                    <div class="form-group mb-3">
                        <label class="pb-2">Old Password</label>
                        <div class="position-relative">
                            <input type="password" name="old_password" class="form-control common-input password-field" placeholder="Old Password">
                            <div class="icon-eye">
                                <i class="fa fa-eye toggle-password" aria-hidden="true" toggle="#password-field"></i>
                            </div>
                            <span class="text-danger error-message" id="old_password-error"></span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="pb-2">New Password</label>
                        <div class="position-relative">
                            <input type="password" name="new_password" class="form-control common-input password-field" placeholder="New Password">
                            <div class="icon-eye">
                                <i class="fa fa-eye toggle-password" aria-hidden="true" toggle="#password-field"></i>
                            </div>
                            <span class="text-danger error-message" id="new_password-error"></span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="pb-2">Confirm New Password</label>
                        <div class="position-relative">
                            <input type="password" name="new_password_confirmation" class="form-control common-input password-field" placeholder="Confirm New Password">
                            <div class="icon-eye">
                                <i class="fa fa-eye toggle-password" aria-hidden="true" toggle="#password-field"></i>
                            </div>
                            <span class="text-danger error-message" id="new_password_confirmation-error"></span>
                        </div>
                    </div>
                    <div class="pt-4 pb-3">
                        <button type="submit" class="btn green-btn w-100 box-shadow">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                    
@endif


<!-- Modal for the intro video -->
<div class="modal fade" id="introVideoModal" tabindex="-1" role="dialog" aria-labelledby="introVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent">
            <div class="modal-body p-0 position-relative">
                <button type="button" class=" btn-closed border-0 bg-transparent cross" data-bs-dismiss="modal" aria-label="Close">
                <img src="{{url('/')}}/webassets/img/cross.svg">
                </button>
                <video id="introVideo" width="100%" height="100%" muted autoplay controls>
                    <source src="{{url('/')}}/webassets/img/Introvideo.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>

<div id="minimized-video" style="display: none;">
    <button class="close-btn border-0 bg-transparent">
        <img src="{{url('/')}}/webassets/img/cross.svg" class="w-100 h-100">
    </button>
    <video muted loop>
        <source src="{{url('/')}}/webassets/img/Introvideo.mp4" type="video/mp4">
    </video>
</div>


<div class="modal fade" id="requestcustomsizebtn" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-width">
                <div class="modal-header border-0">
                    <button type="button" class="btn-closed border-0 bg-transparent text-end ms-auto" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{url('/')}}/webassets/img/cross.svg">
                    </button>
                </div>
                <div class="modal-body pt-0">
                <form id="customSizeForm">
                @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Full Name</label>
                                <input type="text" name="full_name" placeholder="Enter here" class="contact-input form-control">
                                <span class="text-danger error-message" id="cerror-full_name"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Email</label>
                                <input type="text" name="email" placeholder="Enter here" class="contact-input form-control">
                                <span class="text-danger error-message" id="cerror-email"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter here" class="contact-input form-control">
                                <span class="text-danger error-message" id="cerror-phone"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Custom Size</label>
                                <input type="text" name="custom_size" placeholder="eg. 21 ft X 45 ft X 2.5 mm" class="contact-input form-control">
                                <span class="text-danger error-message" id="cerror-custom_size"></span>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Address</label>
                                <input type="text" name="address" placeholder="Enter here" class="contact-input form-control" id="autocomplete">
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                                 <!-- <gmp-place-autocomplete
                                    id="autocomplete"
                                    style="width: 100%;"
                                    placeholder="Enter your address"
                                    componentRestrictions='{"country": "in"}' class="contact-input form-control">
                                </gmp-place-autocomplete>
                                <input type="hidden" id="caddress" name="address" required /> -->
                                <span class="text-danger error-message" id="cerror-address"></span>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="form-group">
                                <label class="primary-theme">Your Message</label>
                                <textarea name="description" placeholder="Enter here" class="contact-input form-control"></textarea>
                                <span class="text-danger cerror-message" id="cerror-description"></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <!-- <button type="submit" class="green-btn">Submit</button> -->
                            <button type="submit" id="submitCustomSizeBtn" class="green-btn">
                                <span class="spinner-border spinner-border-sm d-none me-2" role="status" aria-hidden="true"></span>
                                <span class="btn-text">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
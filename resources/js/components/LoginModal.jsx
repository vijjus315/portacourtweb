import React, { useState } from 'react';
import { login as apiLogin } from '../api/auth.js';
import { checkAndOpenOTPVerification } from '../utils/otpVerification.js';

function getCsrf() {
    // Look for a <meta> tag in the HTML with name="csrf-token"
    const el = document.querySelector('meta[name="csrf-token"]');
    
    // If the element exists, return the value of its "content" attribute
    // Otherwise, return an empty string
    return el ? el.getAttribute('content') : '';
}


const LoginModal = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [remember, setRemember] = useState(false);
    const [errors, setErrors] = useState({});
    const [submitting, setSubmitting] = useState(false);

    const handleSubmit = async (e) => {
    e.preventDefault(); 
    setSubmitting(true); 
    // Set a "submitting" state so UI can show a loader/spinner or disable the button
    setErrors({}); 
    // Clear any previous validation errors before a new request
    try {
        // Always use external API (avoids local 419/CSRF)
        const data = await apiLogin({ email, password }); 
        // Call the login API with user credentials

        if (data.success === true) { 
            // If login was successful (API returned success flag)
            console.log('🎉 Login API call successful');
            
            // Store token and user data in localStorage
            if (data.body && data.body.token) {
                localStorage.setItem('auth_token', data.body.token);
                localStorage.setItem('user_data', JSON.stringify(data.body.user));
                console.log('💾 User data stored in localStorage');
            }

            // Check OTP verification status after successful login
            if (data.body && data.body.user && data.body.user.is_otp_verified === 1) { 
                // Case 1: User's OTP is already verified (is_otp_verified === 1)
                // → Redirect to home page
                console.log('✅ Login successful - OTP already verified, redirecting to home page');
                console.log('🔍 is_otp_verified:', data.body.user.is_otp_verified);

                if (window.toastr) window.toastr.success(data.message || 'Logged in successfully'); 
                // Show success toast message if toastr library is available

                // Hide login modal
                const loginEl = document.getElementById('loginmodal');
                try { 
                    window.bootstrap.Modal.getInstance(loginEl)?.hide(); 
                } catch (_) {} 

                // Dispatch custom event for header update
                window.dispatchEvent(new CustomEvent('userLoggedIn'));

                window.location.href = '/'; 
                // Redirect user to homepage
            } else { 
                // Case 2: User's OTP is not verified (is_otp_verified === 0 or undefined)
                // → Open VerifyEmailModal for OTP verification
                console.log('🔄 Login successful but OTP not verified, opening VerifyEmailModal');
                console.log('📧 User email:', data.body?.user?.email || email);
                console.log('🔍 is_otp_verified:', data.body?.user?.is_otp_verified);

                // Get the login modal element
                const loginEl = document.getElementById('loginmodal');

                try { 
                    // Try hiding the login modal (in case it's open)
                    window.bootstrap.Modal.getInstance(loginEl)?.hide(); 
                } catch (_) {} 
                // If Bootstrap modal instance not found, safely ignore the error

                // Use utility function to check and open OTP verification
                const needsOTPVerification = checkAndOpenOTPVerification(data.body.user, data.body?.user?.email || email);
                
                if (needsOTPVerification) {
                  console.log('✅ VerifyEmailModal opened successfully');
                } else {
                  console.log('⚠️ VerifyEmailModal could not be opened');
                }

                if (window.toastr && data.message) window.toastr.success(data.message); 
                // Show a message (e.g. "OTP sent to your email") in toast
            }
        } else { 
            // If login was not successful
            console.log('❌ Login failed:', data);

            // Check if the error is specifically about OTP verification
            if (data.message === "Please verify your OTP") {
                console.log('🔄 Login failed due to OTP verification required, opening VerifyEmailModal');
                
                // Hide login modal
                const loginEl = document.getElementById('loginmodal');
                try { 
                    window.bootstrap.Modal.getInstance(loginEl)?.hide(); 
                } catch (_) {} 

                // Use utility function to check and open OTP verification
                // We'll use the email from the form since the API didn't return user data
                const needsOTPVerification = checkAndOpenOTPVerification({ is_otp_verified: 0 }, email);
                
                if (needsOTPVerification) {
                  console.log('✅ VerifyEmailModal opened successfully for OTP verification');
                } else {
                  console.log('⚠️ VerifyEmailModal could not be opened');
                }

                // Show the OTP verification message
                if (window.toastr) window.toastr.info(data.message); 
            } else if (data.errors) { 
                // If server returned validation errors
                setErrors(data.errors); 
                // Save them into state so UI can display inline errors
            } else if (data.message) { 
                // If only a general error message was returned
                if (window.toastr) window.toastr.error(data.message); 
                // Show error toast
            }
        }
    } catch (err) { 
        // Handle unexpected errors (network/server issues)
        console.log('❌ Login error:', err);
        console.log('🔍 Error structure:', {
            status: err.status,
            data: err.data,
            response: err.response,
            message: err.data?.message || err.response?.data?.message
        });

        if (err.response && err.response.status === 422) { 
            // If backend returned validation errors (HTTP 422 Unprocessable Entity)
            setErrors(err.response.data.errors || {}); 
            // Save those validation errors into state
        } else if (err.response && err.response.data && err.response.data.message === "Please verify your OTP") {
            // Handle OTP verification error from network response
            console.log('🔄 Network error - OTP verification required, opening VerifyEmailModal');
            
            // Hide login modal
            const loginEl = document.getElementById('loginmodal');
            try { 
                window.bootstrap.Modal.getInstance(loginEl)?.hide(); 
            } catch (_) {} 

            // Use utility function to check and open OTP verification
            const needsOTPVerification = checkAndOpenOTPVerification({ is_otp_verified: 0 }, email);
            
            if (needsOTPVerification) {
              console.log('✅ VerifyEmailModal opened successfully for OTP verification');
            } else {
              console.log('⚠️ VerifyEmailModal could not be opened');
            }

            // Show the OTP verification message
            if (window.toastr) window.toastr.info(err.response.data.message); 
        } else if (err.status === 400 && err.data && err.data.message === "Please verify your OTP") {
            // Handle OTP verification error from API client interceptor (400 status)
            console.log('🔄 API client error - OTP verification required, opening VerifyEmailModal');
            
            // Hide login modal
            const loginEl = document.getElementById('loginmodal');
            try { 
                window.bootstrap.Modal.getInstance(loginEl)?.hide(); 
            } catch (_) {} 

            // Use utility function to check and open OTP verification
            const needsOTPVerification = checkAndOpenOTPVerification({ is_otp_verified: 0 }, email);
            
            if (needsOTPVerification) {
              console.log('✅ VerifyEmailModal opened successfully for OTP verification');
            } else {
              console.log('⚠️ VerifyEmailModal could not be opened');
            }

            // Show the OTP verification message
            if (window.toastr) window.toastr.info(err.data.message); 
        } else { 
            // Any other error (network, server crash, etc.)
            if (window.toastr) window.toastr.error('An error occurred. Please try again.'); 
            // Show generic error toast
        }
    } finally {
        setSubmitting(false); 
        // Reset submitting state so button/loader is re-enabled
    }
};


    return (
        <div className="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabIndex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content modal-content-width">
                    <div className="modal-header border-0">
                        <h5 className="modal-title font-Yantramanav" id="staticBackdropLabel">Welcome to Portacourts</h5>
                        <button type="button" className="btn-closed border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close"><img src={`${window.location.origin}/webassets/img/cross.svg`} /></button>
                    </div>
                    <div className="modal-body pt-0">
                        <h1 className="font-oswald pb-4">Sign In</h1>
                        <form id="loginForm" onSubmit={handleSubmit}>
                            <input type="hidden" name="_token" value={getCsrf()} />
                            <div className="form-group mb-4">
                                <label className="pb-2">Email</label>
                                <input type="email" className="form-control common-input" id="loginEmail" placeholder="Email address" name="email" value={email} onChange={(e) => setEmail(e.target.value)} />
                                <span className="text-danger error-message" id="login-error-email">{errors.email && errors.email[0]}</span>
                                <div className="invalid-feedback"></div>
                            </div>
                            <div className="form-group">
                                <label className="pb-2">Password</label>
                                <div className="position-relative">
                                    <input type="password" className="form-control common-input password-field" id="loginPassword" placeholder="Password" name="password" value={password} onChange={(e) => setPassword(e.target.value)} />
                                    <div className="icon-eye">
                                        <i className="fa fa-eye toggle-password" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div className="invalid-feedback"></div>
                                <span className="text-danger error-message" id="login-error-password">{errors.password && errors.password[0]}</span>
                            </div>
                            <div className="pt-3 d-flex justify-content-between align-items-center">
                                <div className="checkbox">
                                    <label className="checkbox-inline d-flex gap-2 align-items-center" htmlFor="remember">
                                        <input name="remember" id="remember" type="checkbox" className="check_form" checked={remember} onChange={(e) => setRemember(e.target.checked)} />Remember me
                                    </label>
                                </div>
                                <a className="lost-pass primary-theme text-decoration-none f16-size fw-400" href="#" data-bs-toggle="modal" data-bs-target="#forgotmodal">
                                    Forgot Password?
                                </a>
                            </div>
                            <div className="pt-4 pb-3">
                                <button type="submit" className="btn green-btn w-100 box-shadow" disabled={submitting}>{submitting ? 'Signing in…' : 'Sign in'}</button>
                            </div>
                            <div className="text-center">
                                <p className="font-Yantramanav light-grey"> Don’t have any account? <a className="theme_color text-decoration-underline fw-500" href="#" data-bs-toggle="modal" data-bs-target="#signupmodal">Sign up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default LoginModal;



import React, { useState } from 'react';
import { login as apiLogin } from '../api/auth.js';

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

            if (data.is_verified) { 
                // If the user’s email/account is already verified

                if (window.toastr) window.toastr.success('Logged in successfully'); 
                // Show success toast message if toastr library is available

                window.location.href = '/'; 
                // Redirect user to homepage
            } else { 
                // If the user is not verified (requires OTP verification)

                // Get the login modal element
                const loginEl = document.getElementById('loginmodal');

                try { 
                    // Try hiding the login modal (in case it’s open)
                    window.bootstrap.Modal.getInstance(loginEl)?.hide(); 
                } catch (_) {} 
                // If Bootstrap modal instance not found, safely ignore the error

                // Find the span/element where email is displayed in OTP modal
                const emailDisplay = document.getElementById('emailDisplay');
                if (emailDisplay) emailDisplay.innerText = data.email || email; 
                // Update it with the user’s email (from API response or input)

                // Hidden input for OTP form to pass email
                const ve = document.getElementById('verifyOtpEmail');
                if (ve) ve.value = data.email || email; 
                // Store email value in hidden field for OTP verification

                // Initialize the verify-email modal
                const verifyModal = new window.bootstrap.Modal(document.getElementById('verifyemail'));
                verifyModal.show(); 
                // Show the OTP verification modal

                if (window.toastr && data.message) window.toastr.success(data.message); 
                // Show a message (e.g. "OTP sent to your email") in toast
            }
        } else { 
            // If login was not successful

            if (data.errors) { 
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

        if (err.response && err.response.status === 422) { 
            // If backend returned validation errors (HTTP 422 Unprocessable Entity)
            setErrors(err.response.data.errors || {}); 
            // Save those validation errors into state
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



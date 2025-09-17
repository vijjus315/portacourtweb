import React, { useState, useRef, useEffect } from 'react';
import { verifyForgotPasswordOtp, resendForgotPasswordOtp } from '../api/auth.js';
import '../bootstrap';

const ForgotVerifyOtpModal = () => {
    const [otp, setOtp] = useState(['', '', '', '', '', '']);
    const [email, setEmail] = useState('');
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState('');
    const [isResending, setIsResending] = useState(false);
    const inputRefs = useRef([]);

    // Function to get CSRF token
    const getCsrf = () => {
        const el = document.querySelector('meta[name="csrf-token"]');
        return el ? el.getAttribute('content') : '';
    };

    // Handle OTP input change
    const handleOtpChange = (index, value) => {
        if (value.length > 1) return; // Prevent multiple characters
        
        const newOtp = [...otp];
        newOtp[index] = value;
        setOtp(newOtp);
        setError('');

        // Auto-focus next input
        if (value && index < 5) {
            inputRefs.current[index + 1]?.focus();
        }
    };

    // Handle backspace
    const handleKeyDown = (index, e) => {
        if (e.key === 'Backspace' && !otp[index] && index > 0) {
            inputRefs.current[index - 1]?.focus();
        }
    };

    // Handle paste
    const handlePaste = (e) => {
        e.preventDefault();
        const pastedData = e.clipboardData.getData('text').replace(/\D/g, '').slice(0, 6);
        const newOtp = [...otp];
        for (let i = 0; i < pastedData.length && i < 6; i++) {
            newOtp[i] = pastedData[i];
        }
        setOtp(newOtp);
        setError('');
        
        // Focus the next empty input or the last one
        const nextEmptyIndex = newOtp.findIndex((digit, idx) => !digit && idx < 6);
        const focusIndex = nextEmptyIndex !== -1 ? nextEmptyIndex : 5;
        inputRefs.current[focusIndex]?.focus();
    };

    // Handle form submission
    const handleSubmit = async (e) => {
        e.preventDefault();
        const otpCode = otp.join('');
        
        if (otpCode.length !== 6) {
            setError('Please enter all 6 digits');
            return;
        }

        setIsLoading(true);
        setError('');

        try {
            const response = await verifyForgotPasswordOtp({
                email: email,
                otp: otpCode,
                _token: getCsrf()
            });

            if (response.success) {
                // Close current modal
                const modal = document.getElementById('forgotverifyOtpModal');
                if (modal) {
                    const bootstrapModal = window.bootstrap.Modal.getInstance(modal);
                    if (bootstrapModal) {
                        bootstrapModal.hide();
                    }
                }
                
                // Open reset password modal
                const resetModal = document.getElementById('resetPasswordModal');
                if (resetModal) {
                    const resetBootstrapModal = new window.bootstrap.Modal(resetModal);
                    resetBootstrapModal.show();
                    
                    // Set email in reset password form
                    const resetEmailInput = document.getElementById('resetEmail');
                    if (resetEmailInput) {
                        resetEmailInput.value = email;
                    }
                }
                
                // Show success message
                if (window.toastr) {
                    window.toastr.success(response.message || 'OTP verified successfully!');
                }
            } else {
                setError(response.message || 'Invalid OTP. Please try again.');
            }
        } catch (err) {
            console.error('Error verifying OTP:', err);
            setError('Failed to verify OTP. Please try again.');
        } finally {
            setIsLoading(false);
        }
    };

    // Handle resend OTP
    const handleResendOtp = async () => {
        if (!email) {
            setError('Email not found. Please try again.');
            return;
        }

        setIsResending(true);
        setError('');

        try {
            const response = await resendForgotPasswordOtp({
                email: email,
                _token: getCsrf()
            });

            if (response.success) {
                if (window.toastr) {
                    window.toastr.success(response.message || 'OTP sent successfully!');
                }
            } else {
                setError(response.message || 'Failed to resend OTP. Please try again.');
            }
        } catch (err) {
            console.error('Error resending OTP:', err);
            setError('Failed to resend OTP. Please try again.');
        } finally {
            setIsResending(false);
        }
    };

    // Set email when modal is shown
    useEffect(() => {
        const modal = document.getElementById('forgotverifyOtpModal');
        if (modal) {
            const handleShow = () => {
                const emailDisplay = document.getElementById('emailDisplay');
                const emailInput = document.getElementById('otpEmail');
                if (emailDisplay && emailInput) {
                    const emailValue = emailDisplay.textContent || emailInput.value;
                    setEmail(emailValue);
                }
            };

            modal.addEventListener('shown.bs.modal', handleShow);
            return () => {
                modal.removeEventListener('shown.bs.modal', handleShow);
            };
        }
    }, []);

    return (
        <div className="modal fade" id="forgotverifyOtpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabIndex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content modal-content-width">
                    <div className="modal-header border-0">
                        <button 
                            type="button" 
                            className="btn-closed border-0 bg-transparent text-end ms-auto" 
                            data-bs-dismiss="modal" 
                            aria-label="Close"
                        >
                            <img src={`${window.location.origin}/webassets/img/cross.svg`} alt="Close" />
                        </button>
                    </div>
                    <div className="modal-body pt-0">
                        <div className="text-center">
                            <img src={`${window.location.origin}/webassets/img/resetpwd.png`} className="img-fluid" alt="Verify Email" />
                            <h1 className="font-oswald pb-1">Verify Email</h1>
                            <p>We have sent an email with verification information to <span id="emailDisplay"></span></p>
                        </div>
                        <form id="forgotverifyOtpForm" onSubmit={handleSubmit}>
                            <input type="hidden" id="otpEmail" name="email" value={email} />
                            <div className="form-group otp-input">
                                {otp.map((digit, index) => (
                                    <input
                                        key={index}
                                        ref={(el) => (inputRefs.current[index] = el)}
                                        type="text"
                                        className="form-control newotp-input-field"
                                        name="otp[]"
                                        maxLength="1"
                                        value={digit}
                                        onChange={(e) => handleOtpChange(index, e.target.value)}
                                        onKeyDown={(e) => handleKeyDown(index, e)}
                                        onPaste={index === 0 ? handlePaste : undefined}
                                        required
                                        disabled={isLoading}
                                    />
                                ))}
                            </div>
                            <div className="pt-4 pb-3">
                                <button 
                                    type="submit" 
                                    className="btn green-btn w-100 box-shadow"
                                    disabled={isLoading || otp.join('').length !== 6}
                                >
                                    {isLoading ? (
                                        <>
                                            <div className="spinner-border spinner-border-sm me-2" role="status">
                                                <span className="visually-hidden">Loading...</span>
                                            </div>
                                            Verifying...
                                        </>
                                    ) : (
                                        'Submit'
                                    )}
                                </button>
                                <span className="text-danger error-message" id="forgotverify-error-otp">{error}</span>
                            </div>
                            <a 
                                className="primary-theme font-Yantramanav text-decoration-underline fw-400 text-center mt-2 d-flex mx-auto justify-content-center align-items-center" 
                                id="resendOtpBtn"
                                onClick={handleResendOtp}
                                style={{ cursor: 'pointer' }}
                            >
                                {isResending ? (
                                    <>
                                        <div className="spinner-border spinner-border-sm me-2" role="status">
                                            <span className="visually-hidden">Loading...</span>
                                        </div>
                                        Resending...
                                    </>
                                ) : (
                                    'Resend Code'
                                )}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ForgotVerifyOtpModal;

import React, { useState, useRef, useEffect } from 'react';
import { verifyOtp, resendOtp } from '../api/auth.js';
import { updateUserDataAfterOTPVerification, clearAuthDataOnOTPCancel } from '../utils/otpVerification.js';
import '../bootstrap';

const VerifyEmailModal = () => {
    const [otp, setOtp] = useState(['', '', '', '', '']);
    const [email, setEmail] = useState('');
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState('');
    const [isResending, setIsResending] = useState(false);
    const [verificationType, setVerificationType] = useState('signup');
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
        if (value && index < 4) {
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
        const pastedData = e.clipboardData.getData('text').replace(/\D/g, '').slice(0, 5);
        const newOtp = [...otp];
        for (let i = 0; i < pastedData.length && i < 5; i++) {
            newOtp[i] = pastedData[i];
        }
        setOtp(newOtp);
        setError('');
        
        // Focus the next empty input or the last one
        const nextEmptyIndex = newOtp.findIndex((digit, idx) => !digit && idx < 5);
        const focusIndex = nextEmptyIndex !== -1 ? nextEmptyIndex : 4;
        inputRefs.current[focusIndex]?.focus();
    };

    // Handle form submission
    const handleSubmit = async (e) => {
        e.preventDefault();
        const otpCode = otp.join('');
        
        if (otpCode.length !== 5) {
            setError('Please enter all 5 digits');
            return;
        }

        setIsLoading(true);
        setError('');

        try {
            const response = await verifyOtp({
                email: email,
                otp: otpCode,
                type: verificationType,
                _token: getCsrf()
            });

            if (response.success) {
                // Close modal
                const modal = document.getElementById('verifyemail');
                if (modal) {
                    const bootstrapModal = window.bootstrap.Modal.getInstance(modal);
                    if (bootstrapModal) {
                        bootstrapModal.hide();
                    }
                }
                
                // Show success message
                if (window.toastr) {
                    window.toastr.success(response.message || 'Email verified successfully!');
                }
                
                // Update user data in localStorage to mark as verified
                try {
                    const userData = JSON.parse(localStorage.getItem('user_data') || '{}');
                    const updatedUserData = {
                        ...userData,
                        is_otp_verified: 1
                    };
                    
                    // Use utility function to update user data
                    updateUserDataAfterOTPVerification(updatedUserData);
                } catch (err) {
                    console.error('Error updating user data:', err);
                }
                
                // Redirect to home page
                window.location.href = '/';
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
            setError('Email not found. Please try logging in again.');
            return;
        }

        setIsResending(true);
        setError('');

        try {
            const response = await resendOtp({
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

    // Set email and verification type when modal is shown, and handle modal cancellation
    useEffect(() => {
        const modal = document.getElementById('verifyemail');
        if (modal) {
            const handleShow = () => {
                // Set global flag to prevent interference
                window.otpVerificationInProgress = true;
                
                const emailDisplay = document.getElementById('emailDisplay');
                const emailInput = document.getElementById('verifyOtpEmail');
                if (emailDisplay && emailInput) {
                    const emailValue = emailDisplay.textContent || emailInput.value;
                    setEmail(emailValue);
                }
                
                // Determine verification type based on context
                // Check if we came from login (look for login modal being closed recently)
                const userData = JSON.parse(localStorage.getItem('user_data') || '{}');
                const authToken = localStorage.getItem('auth_token');
                
                // If user just logged in and has token but needs OTP verification, it's login type
                if (authToken && userData.email && userData.is_otp_verified === 0) {
                    // Check if login modal was recently closed (within last 2 seconds)
                    const loginModalClosed = sessionStorage.getItem('loginModalClosed');
                    const currentTime = Date.now();
                    if (loginModalClosed && (currentTime - parseInt(loginModalClosed)) < 2000) {
                        setVerificationType('login');
                        console.log('🔄 Setting verification type to login');
                    } else {
                        setVerificationType('signup');
                        console.log('🔄 Setting verification type to signup');
                    }
                } else {
                    setVerificationType('signup');
                    console.log('🔄 Setting verification type to signup (default)');
                }
            };

            const handleHide = () => {
                // Clear the global flag
                window.otpVerificationInProgress = false;
                
                // Check if this is a cancellation (not a successful verification)
                // If user has auth token but OTP is not verified, they cancelled the verification
                const userData = JSON.parse(localStorage.getItem('user_data') || '{}');
                const authToken = localStorage.getItem('auth_token');
                
                // Only proceed with cleanup if user actually cancelled (not if modal was programmatically hidden)
                if (authToken && userData && userData.is_otp_verified === 0) {
                    console.log('🔄 OTP verification modal was cancelled, clearing auth data');
                    
                    // Don't dispose the OTP modal instance - let it remain for potential reuse
                    
                    clearAuthDataOnOTPCancel();
                }
                
                // Comprehensive modal cleanup to ensure other modals can open
                setTimeout(() => {
                    try {
                        // Comprehensive modal cleanup - don't dispose instances
                        const allModals = document.querySelectorAll('.modal');
                        allModals.forEach(modal => {
                            try {
                                // Reset modal state only - don't dispose instances
                                modal.removeAttribute('aria-hidden');
                                if (modal.classList) {
                                    modal.classList.remove('show', 'fade');
                                }
                                modal.style.display = 'none';
                                modal.style.paddingRight = '';
                                
                                // Remove any modal dialogs
                                const modalDialogs = modal.querySelectorAll('.modal-dialog');
                                modalDialogs.forEach(dialog => {
                                    if (dialog.classList) {
                                        dialog.classList.remove('modal-dialog-scrollable');
                                    }
                                });
                            } catch (modalError) {
                                console.warn('Error cleaning up modal:', modalError);
                            }
                        });
                        
                        // Focus management
                        window.focus();
                        document.body.focus();
                        
                        // Remove all modal backdrops
                        const backdrops = document.querySelectorAll('.modal-backdrop');
                        backdrops.forEach(backdrop => {
                            try {
                                backdrop.remove();
                            } catch (backdropError) {
                                console.warn('Error removing backdrop:', backdropError);
                            }
                        });
                        
                        // Reset body classes and styles
                        if (document.body && document.body.classList) {
                            document.body.classList.remove('modal-open');
                        }
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';
                        
                        console.log('✅ Modal cleanup completed, other modals should now work');
                    } catch (cleanupError) {
                        console.error('Error during modal cleanup:', cleanupError);
                    }
                }, 200);
            };

            modal.addEventListener('shown.bs.modal', handleShow);
            modal.addEventListener('hidden.bs.modal', handleHide);
            return () => {
                modal.removeEventListener('shown.bs.modal', handleShow);
                modal.removeEventListener('hidden.bs.modal', handleHide);
            };
        }
    }, []);

    return (
        <div className="modal fade" id="verifyemail" data-bs-backdrop="static" data-bs-keyboard="false" tabIndex="-1" aria-labelledby="staticBackdropLabel">
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content modal-content-width">
                    <div className="modal-header border-0">
                        <button 
                            type="button" 
                            className="btn-closed border-0 bg-transparent text-end ms-auto" 
                            data-bs-dismiss="modal" 
                            aria-label="Close"
                            onClick={() => {
                                // Immediately activate page when close button is clicked
                                window.focus();
                                document.body.focus();
                            }}
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
                        <form id="verifyOtpForm" onSubmit={handleSubmit}>
                            <input type="hidden" id="verifyOtpEmail" name="email" value={email} />
                            <div className="form-group otp-input">
                                {otp.map((digit, index) => (
                                    <input
                                        key={index}
                                        ref={(el) => (inputRefs.current[index] = el)}
                                        type="text"
                                        className="form-control otp-input-field"
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
                                    disabled={isLoading || otp.join('').length !== 5}
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
                                <span className="text-danger error-message" id="error-otp">{error}</span>
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

export default VerifyEmailModal;

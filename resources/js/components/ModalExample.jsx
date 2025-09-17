import React from 'react';
import VerifyEmailModal from './VerifyEmailModal';
import ForgotPasswordModal from './ForgotPasswordModal';
import ForgotVerifyOtpModal from './ForgotVerifyOtpModal';
import SuccessfullModal from './SuccessfullModal';
import ResetPasswordModal from './ResetPasswordModal';
import EditProfileModal from './EditProfileModal';
import ChangePasswordModal from './ChangePasswordModal';

/**
 * Example component showing how to use all the modal components
 * 
 * Usage:
 * 1. Import the modal components in your React component
 * 2. Include them in your JSX return statement
 * 3. The modals will be available globally via their IDs
 * 
 * Modal IDs:
 * - VerifyEmailModal: 'verifyemail'
 * - ForgotPasswordModal: 'forgotmodal'
 * - ForgotVerifyOtpModal: 'forgotverifyOtpModal'
 * - SuccessfullModal: 'successfullmodal'
 * - ResetPasswordModal: 'resetPasswordModal'
 * - EditProfileModal: 'editprofile'
 * - ChangePasswordModal: 'changepwd'
 * 
 * To open modals programmatically:
 * const modal = new window.bootstrap.Modal(document.getElementById('verifyemail'));
 * modal.show();
 * 
 * Or use data attributes:
 * <button data-bs-toggle="modal" data-bs-target="#verifyemail">Verify Email</button>
 * <button data-bs-toggle="modal" data-bs-target="#forgotmodal">Forgot Password</button>
 */
const ModalExample = () => {
    return (
        <>
            {/* Include all the modal components */}
            <VerifyEmailModal />
            <ForgotPasswordModal />
            <ForgotVerifyOtpModal />
            <SuccessfullModal />
            <ResetPasswordModal />
            <EditProfileModal />
            <ChangePasswordModal />
            
            {/* Example buttons to trigger the modals */}
            <div className="d-flex flex-wrap gap-2">
                <button 
                    className="btn btn-primary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#verifyemail"
                >
                    Verify Email
                </button>
                <button 
                    className="btn btn-secondary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#forgotmodal"
                >
                    Forgot Password
                </button>
                <button 
                    className="btn btn-info" 
                    data-bs-toggle="modal" 
                    data-bs-target="#forgotverifyOtpModal"
                >
                    Forgot Verify OTP
                </button>
                <button 
                    className="btn btn-success" 
                    data-bs-toggle="modal" 
                    data-bs-target="#successfullmodal"
                >
                    Success Modal
                </button>
                <button 
                    className="btn btn-warning" 
                    data-bs-toggle="modal" 
                    data-bs-target="#resetPasswordModal"
                >
                    Reset Password
                </button>
                <button 
                    className="btn btn-dark" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editprofile"
                >
                    Edit Profile
                </button>
                <button 
                    className="btn btn-outline-primary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#changepwd"
                >
                    Change Password
                </button>
            </div>
        </>
    );
};

export default ModalExample;

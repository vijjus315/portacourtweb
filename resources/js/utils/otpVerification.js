/**
 * Utility functions for OTP verification handling
 * Ensures consistent behavior across the application
 */

/**
 * Checks if user needs OTP verification and opens VerifyEmailModal if needed
 * @param {Object} userData - User data object from API response
 * @param {string} email - User's email address
 * @returns {boolean} - True if OTP verification is needed, false otherwise
 */
export const checkAndOpenOTPVerification = (userData, email) => {
    console.log('🔍 Checking OTP verification status:', {
        is_verify: userData?.is_verify,
        email: email
    });

    // Check if user needs OTP verification
    // OTP verification is needed if is_otp_verified is 0, null, or undefined
    if (userData && userData.is_verify !== 1) {
        console.log('🔄 User needs OTP verification, opening VerifyEmailModal');
        
        // Set email for OTP verification
        const emailDisplay = document.getElementById('emailDisplay');
        const otpEmailInput = document.getElementById('verifyOtpEmail');
        
        if (emailDisplay) {
            emailDisplay.textContent = email;
            console.log('✅ Email set in display element');
        } else {
            console.warn('⚠️ emailDisplay element not found');
        }
        
        if (otpEmailInput) {
            otpEmailInput.value = email;
            console.log('✅ Email set in input element');
        } else {
            console.warn('⚠️ otpEmailInput element not found');
        }

        // Open verify email modal
        const verifyModal = document.getElementById('verifyemail');
        console.log('🔍 Looking for verifyemail modal:', verifyModal);
        
        if (verifyModal) {
            console.log('✅ VerifyEmailModal found, opening...');
            const verifyBootstrapModal = new window.bootstrap.Modal(verifyModal);
            verifyBootstrapModal.show();
            console.log('🎉 VerifyEmailModal should now be visible');
            return true; // OTP verification is needed
        } else {
            console.error('❌ VerifyEmailModal element not found! Make sure VerifyEmailModal component is included in the page.');
            return false;
        }
    } else {
        console.log('✅ User OTP is already verified or no verification needed');
        return false; // No OTP verification needed
    }
};

/**
 * Checks if user needs OTP verification based on localStorage data
 * @returns {boolean} - True if OTP verification is needed, false otherwise
 */
export const checkOTPVerificationFromStorage = () => {
    try {
        const userData = JSON.parse(localStorage.getItem('user_data') || '{}');
        const email = userData.email;
        
        if (email && userData.is_verify !== 1) {
            console.log('🔄 User in localStorage needs OTP verification');
            return checkAndOpenOTPVerification(userData, email);
        }
        
        return false;
    } catch (error) {
        console.error('Error checking OTP verification from storage:', error);
        return false;
    }
};

/**
 * Updates user data in localStorage after successful OTP verification
 * @param {Object} updatedUserData - Updated user data with is_otp_verified: 1
 */
export const updateUserDataAfterOTPVerification = (updatedUserData) => {
    try {
        localStorage.setItem('user_data', JSON.stringify(updatedUserData));
        console.log('✅ User data updated after OTP verification');
        
        // Dispatch login event to update header
        window.dispatchEvent(new CustomEvent('userLoggedIn', { 
            detail: updatedUserData 
        }));
    } catch (error) {
        console.error('Error updating user data after OTP verification:', error);
    }
};

export default {
    checkAndOpenOTPVerification,
    checkOTPVerificationFromStorage,
    updateUserDataAfterOTPVerification
};

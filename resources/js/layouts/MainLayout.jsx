/**
 * Main Layout Component
 * Used for the home page with all modals and components
 */

import React from 'react';
import { Outlet } from 'react-router-dom';
import Header from '../components/Header.jsx';
import Footer from '../components/Footer.jsx';
import LoginModal from '../components/LoginModal.jsx';
import SignupModal from '../components/SignupModal.jsx';
import VerifyEmailModal from '../components/VerifyEmailModal.jsx';
import ChangePasswordModal from '../components/ChangePasswordModal';
import EditProfileModal from '../components/EditProfileModal';

const MainLayout = () => {
    return (
        <>
            <Header />
            <Outlet />
            <Footer />
            
            {/* All Modals */}
            <LoginModal />
            <SignupModal />
            <VerifyEmailModal />
            <ChangePasswordModal />
            <EditProfileModal />
        </>
    );
};

export default MainLayout;

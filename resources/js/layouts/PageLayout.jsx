/**
 * Page Layout Component
 * Used for all other pages with modals and components
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

const PageLayout = ({ title, children }) => {
    // Set page title
    React.useEffect(() => {
        document.title = title ? `${title} - PortaCourts` : 'PortaCourts';
    }, [title]);

    return (
        <>
            <Header />
            <main>
                <Outlet />
                {children}
            </main>
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

export default PageLayout;

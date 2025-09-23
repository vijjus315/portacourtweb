/**
 * Main application entry point for PortaCourts
 * This file manages routing and application state across all pages
 * Following the same structure as the reference project
 */

import React, { useState, useEffect } from "react";

// Use React Router DOM from CDN
const { BrowserRouter: Router, Routes, Route, Outlet } = window.ReactRouterDOM;

// Import CSS files
import "./public/assets/website.css";

// Import all page components
import Home from "./resources/js/home.jsx";
import Products from "./resources/js/pages/Products.jsx";
import ProductDetail from "./resources/js/pages/ProductDetail.jsx";
import AboutUs from "./resources/js/pages/AboutUs.jsx";
import ContactUs from "./resources/js/pages/ContactUs.jsx";
import Blog from "./resources/js/pages/Blog.jsx";
import BlogDetail from "./resources/js/pages/BlogDetail.jsx";
import Cart from "./resources/js/pages/Cart.jsx";
import Wishlist from "./resources/js/pages/Wishlist.jsx";
import MyOrders from "./resources/js/pages/MyOrders.jsx";
import Address from "./resources/js/pages/Address.jsx";
import TrackOrder from "./resources/js/pages/TrackOrder.jsx";

// Import modals and components
import LoginModal from "./resources/js/components/LoginModal.jsx";
import SignupModal from "./resources/js/components/SignupModal.jsx";
import VerifyEmailModal from "./resources/js/components/VerifyEmailModal.jsx";
import ChangePasswordModal from "./resources/js/components/ChangePasswordModal";
import EditProfileModal from "./resources/js/components/EditProfileModal";
import Header from "./resources/js/components/Header.jsx";
import Footer from "./resources/js/components/Footer.jsx";

// Import layouts
import MainLayout from "./resources/js/layouts/MainLayout.jsx";
import PageLayout from "./resources/js/layouts/PageLayout.jsx";

// Import utilities
import Loader from "./resources/js/components/Loader.jsx";
import ScrollToTop from "./resources/js/components/ScrollToTop.jsx";

// Bootstrap CSS is loaded via CDN in index.html

function App() {
  const [loading, setLoading] = useState(false);
  
  useEffect(() => {
    setLoading(true);
    setTimeout(() => {
      setLoading(false);
    }, 2000);
  }, []);

  return (
    <>
      {loading ? (
        <div className="loaderdiv">
          <Loader />
        </div>
      ) : (
        <Router>
          <ScrollToTop>
            <Routes>
              {/* Main Home Page */}
              <Route path="/" element={<MainLayout />} />

              {/* Product Pages */}
              <Route
                path="/products"
                element={
                  <PageLayout title="Products">
                    <Products />
                  </PageLayout>
                }
              />
              <Route
                path="/product-detail/:slug"
                element={
                  <PageLayout title="Product Detail">
                    <ProductDetail />
                  </PageLayout>
                }
              />

              {/* Company Pages */}
              <Route
                path="/about-us"
                element={
                  <PageLayout title="About Us">
                    <AboutUs />
                  </PageLayout>
                }
              />
              <Route
                path="/contact-us"
                element={
                  <PageLayout title="Contact Us">
                    <ContactUs />
                  </PageLayout>
                }
              />

              {/* Blog Pages */}
              <Route
                path="/blog"
                element={
                  <PageLayout title="Blog">
                    <Blog />
                  </PageLayout>
                }
              />
              <Route
                path="/blogs-detail/:slug"
                element={
                  <PageLayout title="Blog Detail">
                    <BlogDetail />
                  </PageLayout>
                }
              />

              {/* User Account Pages */}
              <Route
                path="/cart"
                element={
                  <PageLayout title="Shopping Cart">
                    <Cart />
                  </PageLayout>
                }
              />
              <Route
                path="/wishlist"
                element={
                  <PageLayout title="Wishlist">
                    <Wishlist />
                  </PageLayout>
                }
              />
              <Route
                path="/wish-list"
                element={
                  <PageLayout title="Wishlist">
                    <Wishlist />
                  </PageLayout>
                }
              />
              <Route
                path="/myorders"
                element={
                  <PageLayout title="My Orders">
                    <MyOrders />
                  </PageLayout>
                }
              />
              <Route
                path="/address"
                element={
                  <PageLayout title="My Addresses">
                    <Address />
                  </PageLayout>
                }
              />
              <Route
                path="/track-order"
                element={
                  <PageLayout title="Track Order">
                    <TrackOrder />
                  </PageLayout>
                }
              />
            </Routes>
          </ScrollToTop>
        </Router>
      )}
    </>
  );
}

export default App;
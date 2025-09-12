import React from 'react';
import "../bootstrap"

const Header = () => {
    return (
        <header className="font-Yantramanav header-wrapper ">
            <nav className="navbar navbar-expand-lg pt-0  pb-0">
                <div className="container">
                    <a className="navbar-brand py-0" href="/"><img src={`${window.location.origin}/webassets/img/logo.svg`} /></a>
                    <button 
                    className="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation"
                    >
                        <span className="navbar navbar-expand-lg" 
                         style={{ height: "12px", width: "16px" }}
                        ></span>
                    </button>

                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li className="nav-item px-2">
                                <a className="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li className="nav-item px-2"><a className="nav-link " href="/products">Products</a></li>
                            <li className="nav-item px-2"><a className="nav-link" href="/blog">Blog</a></li>
                            <li className="nav-item px-2"><a className="nav-link" href="/about-us">About Us</a></li>
                            <li className="nav-item px-2"><a className="nav-link" href="/contact-us">Contact Us</a></li>
                            <li className="nav-item px-2"><a className="nav-link" href="/track-orders">Track Order</a></li>
                        </ul>
                        <div className="d-flex gap-4 align-items-center flex-wrap">
                            <div className="d-flex gap-4 align-items-center ">
                                <a className="wishlist-icon text-decoration-none position-relative me-2" href="/wishlist"><img src={`${window.location.origin}/webassets/img/wishlist.svg`} />
                                    <span className="number-count wishlistcount">0</span>
                                </a>
                                <a className="wishlist-icon text-decoration-none position-relative me-2" href="/cart"><img src={`${window.location.origin}/webassets/img/addtocart.svg`} />
                                    <span className="number-count cartcount">0</span>
                                </a>
                            </div>
                            <div className="d-flex gap-4 align-items-center">
                                <button className="btn green-btn text-white" data-bs-toggle="modal" data-bs-target="#loginmodal" type="button">LOGIN</button>
                                <button className="btn blue-btn text-white " data-bs-toggle="modal" data-bs-target="#signupmodal" type="button">SIGN UP</button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    );
};

export default Header;

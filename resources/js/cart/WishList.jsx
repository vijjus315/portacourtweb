import React from "react";
import { createRoot } from "react-dom/client";
import Header from "../components/Header";
import Footer from "../components/Footer";

const Wishlist = () => {
  return (
    <>
    <Header />
    <div className="py-5">
      <div className="container">
        <div className="row">
          <div className="col-12">
            <div className="border-line"></div>
            <h2 className="text-capitalize">My Wishlist</h2>
          </div>
        </div>

        <div className="row">
          <div className="row pt-4">
            <div className="col-12">
              <div className="empty-cart text-center h-100 py-5">
                <img
                  src="https://www.portacourts.com/webassets/img/EmptyCart.svg"
                  className="img-fluid"
                  alt="Empty Cart"
                />
                <h4 className="fw-400">Hey, it feels so light</h4>
                <p className="fw-400 pb-2">
                  There is nothing in your cart. Let's add some items.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
    </>
  );
};

export default Wishlist;


// Auto-mount when included directly as a script module
if (typeof window !== 'undefined') {
  const el = document.getElementById('react-wish-root');
  if (el) {
    const root = createRoot(el);
    root.render(<Wishlist />);
  }
}
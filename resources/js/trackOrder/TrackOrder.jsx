import React, { useState } from 'react'
import { createRoot } from 'react-dom/client';
import Header from '../components/Header';
import Footer from '../components/Footer';
import '../bootstrap'


const TrackOrder = () => {

  const [orderNumber, setOrderNumber] = useState("");
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e) => {
    e.pventDefault();

    setSubmitted(true);
  }

  return (
    <>
    <Header />
    <section className="trackorder-wrapper py-5">
      <div className="container">
        <div className="row">
          <div className="col-12 text-center">
            <h2 className="text-center text-decoration-underline">Track Your Order</h2>
            {/* <p className="fw-500 f18">To track your order please enter your Order ID in the box below and click the "Track" button. This was given to you on your receipt and in the confirmation email you should have received, or you can get your order ID from your user dashboard.</p> */}
            <p className="fw-500 f18">Enter your Order Number to view the current status of your order.</p>
            
            <form onSubmit={handleSubmit} >
              {/* <input 
                type="hidden" 
                name="_token" 
                value="810pUh6Zu9Mpn9CjIcnh46LwAITAuBVapMAyME5U" 
                autoComplete="off" 
              /> */}
              <input
                  className="trackinput form-control common-input"
                  type="text"
                  name="order_number"
                  placeholder="Enter your Order Number"
                  value={orderNumber}
                  onChange={(e) => setOrderNumber(e.target.value)}
                  required
                />
              <button 
                type="submit" 
                className="black-btn mt-4 track-order-btn w-25"
              >
                Track Order <i className="fa fa-arrow-right me-1" aria-hidden="true"></i>
              </button>
            </form>

            <div className="text-center mt-5">
              <h3 className="mb-3">Need Help with Your Order?</h3>
              <p>Email: <a href="mailto:support@portacourts.com">support@portacourts.com</a></p>
              <p>Phone: <a href="tel:+18005551234">+1 (800) 272-9717</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <Footer />
    </>
  )
}

export default TrackOrder



// Auto-mount when included directly as a script module
if (typeof window !== 'undefined') {
    const el = document.getElementById('react-track-root');
    if (el) {
        const root = createRoot(el);
        root.render(<TrackOrder />);
    }
}

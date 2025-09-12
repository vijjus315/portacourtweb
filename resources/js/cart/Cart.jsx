import { useState } from 'react';
import { createRoot } from 'react-dom/client';
import Header from '../components/Header';
import Footer from '../components/Footer';
import '../bootstrap';

const Cart = () => {
  const [quantity, setQuantity] = useState(1);

  const unitPrice = 8820;
  const totalPrice = unitPrice * quantity;

  const handleQuantity = (type) => {
    if (type === 'increment') setQuantity((prev) => prev + 1);
    if (type === 'decrement' && quantity > 1) setQuantity((prev) => prev - 1);
  };

  return (
    <>
      <Header />

      {/* cart with item */}
      <section className="pt-5">
        <div className="container">
          <h1 className="text-decoration-underline">Cart</h1>
        </div>

        {/* Integrated Cart Section */}
        <section className="py-5 mb-4">
          <div className="container">
            <div className="row common-card-bg">
              {/* Left Side - Cart Items */}
              <div className="col-lg-8 mb-3 mb-lg-0 h-100">
                <div className="add-cart-detail px-2">
                  <div className="table-responsive table-height">
                    <table className="w-100 table cart-table">
                      <thead
                        style={{ verticalAlign: 'middle', height: '70px' }}
                        className="border-grey"
                      >
                        <tr>
                          <th
                            className="font-Yantramanav"
                            style={{
                              fontSize: '20px',
                              fontWeight: 600,
                              color: '#01073D',
                              textAlign: 'start',
                            }}
                          >
                            Product
                          </th>
                          <th
                            className="font-Yantramanav"
                            style={{
                              fontSize: '20px',
                              fontWeight: 600,
                              color: '#01073D',
                              textAlign: 'center',
                            }}
                          >
                            Size
                          </th>
                          <th
                            className="font-Yantramanav"
                            style={{
                              fontSize: '20px',
                              fontWeight: 600,
                              color: '#01073D',
                              textAlign: 'center',
                            }}
                          >
                            Unit Price
                          </th>
                          <th
                            className="font-Yantramanav"
                            style={{
                              fontSize: '20px',
                              fontWeight: 600,
                              color: '#01073D',
                              textAlign: 'center',
                            }}
                          >
                            Qty
                          </th>
                          <th
                            className="font-Yantramanav"
                            style={{
                              fontSize: '20px',
                              fontWeight: 600,
                              color: '#01073D',
                              textAlign: 'center',
                            }}
                          >
                            Price
                          </th>
                        </tr>
                      </thead>
                      <tbody style={{ verticalAlign: 'middle' }}>
                        <tr style={{ height: '60px' }} className="go-to-order">
                          <td
                            className="py-3"
                            style={{
                              textAlign: 'start',
                              fontSize: '16px',
                              fontWeight: 500,
                            }}
                          >
                            <div className="d-flex justify-content-start gap-3 align-items-center cilent-profile-column">
                              <img
                                src="https://www.portacourts.com/storage/images/ZZFA0LxRbGtSVsLxyeiGzhyvUqCVZlMEBKwhli4W.jpg"
                                className="client-profile cart-client-profile"
                                alt="Product"
                              />

                              <div>
                                <p className="text-capitalize font-oswald f20 fw-400 one-line text-black mb-0 cart-item-title">
                                  Pickleball Court – Premium (with Acrylic Top)
                                </p>
                                <div className="d-flex align-items-center gap-2">
                                  <button
                                    type="button"
                                    className="text-danger text-decoration-underline font-Yantramanav remove-item bg-transparent border-0 p-0"
                                  >
                                    Remove
                                  </button>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td
                            className="py-3"
                            style={{
                              textAlign: 'center',
                              fontSize: '16px',
                              fontWeight: 600,
                            }}
                          >
                            21 ft X 45 ft X 3.0 mm
                          </td>
                          <td
                            className="py-3"
                            style={{
                              textAlign: 'center',
                              fontSize: '16px',
                              fontWeight: 600,
                            }}
                          >
                            <span className="text-purple item-price">$8820</span>
                          </td>
                          <td
                            className="py-3"
                            style={{
                              textAlign: 'center',
                              fontSize: '16px',
                              fontWeight: 500,
                            }}
                          >
                            <div className="d-flex justify-content-center align-items-center qty-decre">
                              {/* Decrement */}
                              <button
                                type="button"
                                className="text-decoration-underline add-remove-item bg-transparent border-0 p-0"
                                onClick={() => handleQuantity('decrement')}
                              >
                                <img
                                  src="https://www.portacourts.com/webassets/img/minus.svg"
                                  alt="grey-minus"
                                />
                              </button>

                              {/* Quantity display */}
                              <p className="fw-500 f20 text-black px-3 mb-0 item-count">
                                {quantity}
                              </p>

                              {/* Increment */}
                              <button
                                type="button"
                                className="text-decoration-underline add-remove-item bg-transparent border-0 p-0"
                                onClick={() => handleQuantity('increment')}
                              >
                                <img
                                  src="https://www.portacourts.com/webassets/img/plus.svg"
                                  alt="grey-plus"
                                />
                              </button>
                            </div>
                          </td>
                          {/* total price */}
                          <td
                            className="py-3"
                            style={{
                              textAlign: 'center',
                              fontSize: '16px',
                              fontWeight: 600,
                            }}
                          >
                            <span className="text-purple item-price">
                              ${totalPrice}
                            </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div className="text-end mt-4 mb-2 d-flex ms-auto justify-content-end align-items-end">
                  <button
                    type="button"
                    id="placeOrderButton"
                    className="green-btn w-100 w-auto d-flex justify-content-center align-items-center"
                  >
                    Place Order
                  </button>
                </div>
              </div>

              {/* Right Side - Order Summary */}
              <div className="col-lg-4">
                <div className="order-details-side px-1 px-md-3 py-3 bg-white">
                  <h4 className="fw-700 font-oswald">Order Summary</h4>
                  <ul className="ps-0 list-style-none pt-3">
                    <li>
                      <div className="d-flex justify-content-between pb-2">
                        <p className="fw-400 f17-size mb-0">Total MRP</p>
                        <p
                          className="fw-700 f17-size mb-0 text-black cart-total"
                          id="subtotal"
                        >
                          ${unitPrice * quantity}
                        </p>
                      </div>
                    </li>
                    <li>
                      <div className="d-flex justify-content-between pb-2">
                        <p className="fw-400 f17-size mb-0">Discount on MRP</p>
                        <p
                          className="fw-700 f17-size mb-0"
                          id="totalDiscount"
                          style={{ color: '#1ba685' }}
                        >
                          -${unitPrice * 0.1}
                        </p>
                      </div>
                    </li>
                    <li className="border-bottom">
                      <div className="d-flex justify-content-between pb-2">
                        <p className="fw-400 f17-size mb-0">Shipping Fee</p>
                        <p
                          className="fw-700 f17-size mb-0"
                          style={{ color: '#1ba685' }}
                        >
                          FREE
                        </p>
                      </div>
                    </li>
                    <li>
                      <div className="d-flex justify-content-between pb-2 pt-3">
                        <p className="fw-700 f17">Total Amount</p>
                        <h3 className="fw-700 sky-blue-text font-Yantramanav">
                          ${totalPrice}
                        </h3>
                        <input
                          type="hidden"
                          id="finalTotal"
                          value={totalPrice}
                        />
                      </div>
                    </li>
                  </ul>

                  <div className="coupon-section mb-3">
                    <h4 className="mb-3">Coupons</h4>
                    <div className="d-flex justify-content-between gap-1 pb-2 align-items-center w-100 coupon-res">
                      <div className="d-flex align-items-center gap-2 w-100">
                        <img
                          src="https://www.portacourts.com/webassets/img/couponstag.png"
                          style={{
                            width: '20px',
                            height: '20px',
                            objectFit: 'contain',
                          }}
                          alt="coupon"
                        />
                        <p className="font-oswald text-black fw-600 mb-0 applytext">
                          Apply Coupons
                        </p>
                        <input
                          type="text"
                          id="couponCode"
                          className="form-control coupon-input"
                          placeholder="Enter Coupon Code"
                          style={{ display: 'none' }}
                        />
                      </div>
                      <button
                        type="button"
                        className="btn green-btn"
                        id="applyCoupon"
                      >
                        Apply
                      </button>
                    </div>
                    <div id="couponMessage" className="text-danger"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>

      <Footer />
    </>
  );
};

export default Cart;

// Auto-mount when included directly as a script module
if (typeof window !== 'undefined') {
  const el = document.getElementById('react-carts-root');
  if (el) {
    const root = createRoot(el);
    root.render(<Cart />);
  }
}


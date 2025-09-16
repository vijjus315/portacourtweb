import { useState, useEffect } from 'react';
import { createRoot } from 'react-dom/client';
import Header from '../components/Header';
import Footer from '../components/Footer';
import LoginModal from '../components/LoginModal';
import SignupModal from '../components/SignupModal';
import { getCartItems, updateCartItemQuantity, removeCartItem } from '../api/cart.js';
import { getImageUrl } from '../utils/imageUtils.js';
import '../bootstrap';

const Cart = () => {
  const [cartItems, setCartItems] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(null);
  const [updatingItems, setUpdatingItems] = useState(new Map());

  // Calculate totals
  const subtotal = cartItems.reduce((total, item) => {
    const price = parseFloat(item.product_variants.discounted_price || item.product_variants.price);
    return total + (price * item.quantity);
  }, 0);

  const totalDiscount = cartItems.reduce((total, item) => {
    const originalPrice = parseFloat(item.product_variants.price);
    const discountedPrice = parseFloat(item.product_variants.discounted_price || item.product_variants.price);
    return total + ((originalPrice - discountedPrice) * item.quantity);
  }, 0);

  const finalTotal = subtotal;

  // Fetch cart items on component mount
  useEffect(() => {
    const fetchCartItems = async () => {
      try {
        setIsLoading(true);
        setError(null);
        const response = await getCartItems();
        if (response.success) {
          setCartItems(response.body.cartItems || []);
        } else {
          setError(response.message || 'Failed to fetch cart items');
        }
      } catch (err) {
        console.error('Error fetching cart items:', err);
        setError('Failed to load cart items. Please try again.');
      } finally {
        setIsLoading(false);
      }
    };

    fetchCartItems();
  }, []);

  const handleQuantity = async (cartItemId, type) => {
    const item = cartItems.find(item => item.id === cartItemId);
    if (!item) return;

    let newQuantity = item.quantity;
    if (type === 'increment') {
      newQuantity = item.quantity + 1;
    } else if (type === 'decrement' && item.quantity > 1) {
      newQuantity = item.quantity - 1;
    }

    // Add item to updating state with operation type
    setUpdatingItems(prev => new Map(prev).set(cartItemId, type));

    try {
      await updateCartItemQuantity(item.product_id, newQuantity, item.variant_id);
      // Update local state
      setCartItems(prevItems => 
        prevItems.map(item => 
          item.id === cartItemId 
            ? { ...item, quantity: newQuantity }
            : item
        )
      );
    } catch (err) {
      console.error('Error updating quantity:', err);
      // You might want to show a toast notification here
    } finally {
      // Remove item from updating state
      setUpdatingItems(prev => {
        const newMap = new Map(prev);
        newMap.delete(cartItemId);
        return newMap;
      });
    }
  };

  const handleRemoveItem = async (cartItemId) => {
    const item = cartItems.find(item => item.id === cartItemId);
    if (!item) return;

    try {
      await removeCartItem(item.variant_id);
      // Update local state
      setCartItems(prevItems => prevItems.filter(item => item.id !== cartItemId));
    } catch (err) {
      console.error('Error removing item:', err);
      // You might want to show a toast notification here
    }
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
                        {isLoading ? (
                          <tr>
                            <td colSpan="5" className="text-center py-5">
                              <div className="d-flex justify-content-center align-items-center">
                                <div className="spinner-border text-primary" role="status" style={{ width: '2rem', height: '2rem' }}>
                                  <span className="visually-hidden">Loading...</span>
                                </div>
                                <span className="ms-3">Loading cart items...</span>
                              </div>
                            </td>
                          </tr>
                        ) : error ? (
                          <tr>
                            <td colSpan="5" className="text-center py-5">
                              <div className="text-danger">
                                <p>{error}</p>
                                <button 
                                  className="btn btn-outline-primary"
                                  onClick={() => window.location.reload()}
                                >
                                  Retry
                                </button>
                              </div>
                            </td>
                          </tr>
                        ) : cartItems.length === 0 ? (
                          <tr>
                            <td colSpan="5" className="text-center py-5">
                              <div className="d-flex flex-column align-items-center">
                                <img 
                                  src={`${window.location.origin}/webassets/img/wishlist-empty.png`} 
                                  className="no-data-found mb-3" 
                                  alt="Empty cart"
                                  style={{ width: '150px', height: '150px' }}
                                />
                                <p className="text-muted">Your cart is empty</p>
                                <a href="/products" className="btn btn-primary">Continue Shopping</a>
                              </div>
                            </td>
                          </tr>
                        ) : (
                          cartItems.map((item) => {
                            const product = item.products;
                            const variant = item.product_variants;
                            const imageUrl = product.product_images && product.product_images.length > 0 
                              ? getImageUrl(product.product_images[0].image_url)
                              : `${window.location.origin}/webassets/img/placeholder.jpg`;
                            const unitPrice = parseFloat(variant.discounted_price || variant.price);
                            const totalPrice = unitPrice * item.quantity;

                            return (
                              <tr key={item.id} style={{ height: '60px' }} className="go-to-order">
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
                                      src={imageUrl}
                                      className="client-profile cart-client-profile"
                                      alt={product.title}
                                      style={{ width: '80px', height: '80px', objectFit: 'cover' }}
                                    />

                                    <div>
                                      <p className="text-capitalize font-oswald f20 fw-400 one-line text-black mb-0 cart-item-title">
                                        {product.title}
                                      </p>
                                      <div className="d-flex align-items-center gap-2">
                                        <button
                                          type="button"
                                          className="text-danger text-decoration-underline font-Yantramanav remove-item bg-transparent border-0 p-0"
                                          onClick={() => handleRemoveItem(item.id)}
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
                                  {variant.length} ft X {variant.width} ft X {variant.thickness} mm
                                </td>
                                <td
                                  className="py-3"
                                  style={{
                                    textAlign: 'center',
                                    fontSize: '16px',
                                    fontWeight: 600,
                                  }}
                                >
                                  <span className="text-purple item-price">${unitPrice.toFixed(2)}</span>
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
                                      onClick={() => handleQuantity(item.id, 'decrement')}
                                      disabled={updatingItems.has(item.id) || item.quantity <= 1}
                                      style={{ 
                                        opacity: updatingItems.has(item.id) || item.quantity <= 1 ? 0.5 : 1,
                                        cursor: updatingItems.has(item.id) || item.quantity <= 1 ? 'not-allowed' : 'pointer'
                                      }}
                                    >
                                      {updatingItems.get(item.id) === 'decrement' ? (
                                        <div className="spinner-border spinner-border-sm" role="status">
                                          <span className="visually-hidden">Loading...</span>
                                        </div>
                                      ) : (
                                        <img
                                          src="https://www.portacourts.com/webassets/img/minus.svg"
                                          alt="grey-minus"
                                        />
                                      )}
                                    </button>

                                    {/* Quantity display */}
                                    <p className="fw-500 f20 text-black px-3 mb-0 item-count">
                                      {item.quantity}
                                    </p>

                                    {/* Increment */}
                                    <button
                                      type="button"
                                      className="text-decoration-underline add-remove-item bg-transparent border-0 p-0"
                                      onClick={() => handleQuantity(item.id, 'increment')}
                                      disabled={updatingItems.has(item.id)}
                                      style={{ 
                                        opacity: updatingItems.has(item.id) ? 0.5 : 1,
                                        cursor: updatingItems.has(item.id) ? 'not-allowed' : 'pointer'
                                      }}
                                    >
                                      {updatingItems.get(item.id) === 'increment' ? (
                                        <div className="spinner-border spinner-border-sm" role="status">
                                          <span className="visually-hidden">Loading...</span>
                                        </div>
                                      ) : (
                                        <img
                                          src="https://www.portacourts.com/webassets/img/plus.svg"
                                          alt="grey-plus"
                                        />
                                      )}
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
                                    ${totalPrice.toFixed(2)}
                                  </span>
                                </td>
                              </tr>
                            );
                          })
                        )}
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
                          ${subtotal.toFixed(2)}
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
                          -${totalDiscount.toFixed(2)}
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
                          ${finalTotal.toFixed(2)}
                        </h3>
                        <input
                          type="hidden"
                          id="finalTotal"
                          value={finalTotal}
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

      {/* Login and Signup Modals */}
      <LoginModal />
      <SignupModal />

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


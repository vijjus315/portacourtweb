/**
 * Cart Page Component
 */

import React, { useEffect, useState } from 'react';

const Cart = () => {
    const [cartItems, setCartItems] = useState([]);
    const [loading, setLoading] = useState(true);
    const [updating, setUpdating] = useState(false);

    useEffect(() => {
        loadCartItems();
    }, []);

    const loadCartItems = async () => {
        try {
            const res = await window.axios.get('/cart-items');
            setCartItems(res.data.items || []);
        } catch (error) {
            console.error('Error loading cart items:', error);
        } finally {
            setLoading(false);
        }
    };

    const updateQuantity = async (itemId, newQuantity) => {
        if (newQuantity < 1) {
            await removeItem(itemId);
            return;
        }

        setUpdating(true);
        try {
            const res = await window.axios.put(`/cart/update/${itemId}`, {
                quantity: newQuantity
            });
            if (res.data.success) {
                setCartItems(prev => 
                    prev.map(item => 
                        item.id === itemId ? { ...item, quantity: newQuantity } : item
                    )
                );
            }
        } catch (error) {
            console.error('Error updating quantity:', error);
            window.toastr.error('Error updating quantity');
        } finally {
            setUpdating(false);
        }
    };

    const removeItem = async (itemId) => {
        setUpdating(true);
        try {
            const res = await window.axios.delete(`/cart/remove/${itemId}`);
            if (res.data.success) {
                setCartItems(prev => prev.filter(item => item.id !== itemId));
                window.toastr.success('Item removed from cart');
            }
        } catch (error) {
            console.error('Error removing item:', error);
            window.toastr.error('Error removing item');
        } finally {
            setUpdating(false);
        }
    };

    const calculateTotal = () => {
        return cartItems.reduce((total, item) => {
            const price = item.variant?.discounted_price || item.variant?.price || 0;
            return total + (price * item.quantity);
        }, 0);
    };

    const handleCheckout = () => {
        if (cartItems.length === 0) {
            window.toastr.warning('Your cart is empty');
            return;
        }
        // Redirect to checkout or open checkout modal
        window.location.href = '/checkout';
    };

    if (loading) {
        return (
            <div className="container py-5">
                <div className="text-center">
                    <div className="spinner-border" role="status">
                        <span className="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        );
    }

    return (
        <div className="cart-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <h1 className="mb-5">Shopping Cart</h1>
                    </div>
                </div>

                {cartItems.length === 0 ? (
                    <div className="text-center py-5">
                        <h3>Your cart is empty</h3>
                        <p>Add some products to get started!</p>
                        <a href="/products" className="btn btn-primary">
                            Shop Now
                        </a>
                    </div>
                ) : (
                    <div className="row">
                        <div className="col-lg-8">
                            {cartItems.map(item => (
                                <div key={item.id} className="card mb-3">
                                    <div className="card-body">
                                        <div className="row align-items-center">
                                            <div className="col-md-2">
                                                <img 
                                                    src={`/storage/${item.product?.product_images?.[0]?.image_url}`} 
                                                    className="img-fluid" 
                                                    alt={item.product?.title}
                                                    style={{ height: '80px', objectFit: 'cover' }}
                                                />
                                            </div>
                                            <div className="col-md-4">
                                                <h5 className="mb-1">{item.product?.title}</h5>
                                                <p className="text-muted mb-0">
                                                    {item.variant?.title || 'Default'}
                                                </p>
                                            </div>
                                            <div className="col-md-2">
                                                <div className="input-group">
                                                    <button 
                                                        className="btn btn-outline-secondary btn-sm"
                                                        onClick={() => updateQuantity(item.id, item.quantity - 1)}
                                                        disabled={updating}
                                                    >
                                                        -
                                                    </button>
                                                    <input 
                                                        type="number" 
                                                        className="form-control form-control-sm text-center"
                                                        value={item.quantity}
                                                        onChange={(e) => updateQuantity(item.id, parseInt(e.target.value))}
                                                        min="1"
                                                        disabled={updating}
                                                    />
                                                    <button 
                                                        className="btn btn-outline-secondary btn-sm"
                                                        onClick={() => updateQuantity(item.id, item.quantity + 1)}
                                                        disabled={updating}
                                                    >
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                            <div className="col-md-2">
                                                <span className="h5 text-primary">
                                                    ${(item.variant?.discounted_price || item.variant?.price || 0) * item.quantity}.00
                                                </span>
                                            </div>
                                            <div className="col-md-2 text-end">
                                                <button 
                                                    className="btn btn-outline-danger btn-sm"
                                                    onClick={() => removeItem(item.id)}
                                                    disabled={updating}
                                                >
                                                    <i className="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                        <div className="col-lg-4">
                            <div className="card">
                                <div className="card-header">
                                    <h5 className="mb-0">Order Summary</h5>
                                </div>
                                <div className="card-body">
                                    <div className="d-flex justify-content-between mb-3">
                                        <span>Subtotal:</span>
                                        <span>${calculateTotal()}.00</span>
                                    </div>
                                    <div className="d-flex justify-content-between mb-3">
                                        <span>Shipping:</span>
                                        <span>Free</span>
                                    </div>
                                    <div className="d-flex justify-content-between mb-3">
                                        <span>Tax:</span>
                                        <span>$0.00</span>
                                    </div>
                                    <hr />
                                    <div className="d-flex justify-content-between mb-3">
                                        <strong>Total:</strong>
                                        <strong>${calculateTotal()}.00</strong>
                                    </div>
                                    <button 
                                        className="btn btn-primary w-100"
                                        onClick={handleCheckout}
                                    >
                                        Proceed to Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
};

export default Cart;

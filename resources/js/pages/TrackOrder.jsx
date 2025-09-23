/**
 * Track Order Page Component
 */

import React, { useEffect, useState } from 'react';

// Use React Router DOM from CDN
const { useParams } = window.ReactRouterDOM;

const TrackOrder = () => {
    const { orderId } = useParams();
    const [order, setOrder] = useState(null);
    const [loading, setLoading] = useState(true);
    const [trackingNumber, setTrackingNumber] = useState('');
    const [searchLoading, setSearchLoading] = useState(false);

    useEffect(() => {
        if (orderId) {
            loadOrder(orderId);
        }
    }, [orderId]);

    const loadOrder = async (id) => {
        try {
            const res = await window.axios.get(`/order-detail/${id}`);
            setOrder(res.data.order);
        } catch (error) {
            console.error('Error loading order:', error);
        } finally {
            setLoading(false);
        }
    };

    const handleSearch = async (e) => {
        e.preventDefault();
        if (!trackingNumber.trim()) {
            window.toastr.warning('Please enter a tracking number');
            return;
        }

        setSearchLoading(true);
        try {
            const res = await window.axios.get(`/track-order/${trackingNumber}`);
            setOrder(res.data.order);
        } catch (error) {
            console.error('Error tracking order:', error);
            window.toastr.error('Order not found or tracking number is invalid');
            setOrder(null);
        } finally {
            setSearchLoading(false);
        }
    };

    const getStatusSteps = (status) => {
        const steps = [
            { key: 'pending', label: 'Order Placed', icon: 'fa-shopping-cart' },
            { key: 'confirmed', label: 'Confirmed', icon: 'fa-check-circle' },
            { key: 'processing', label: 'Processing', icon: 'fa-cog' },
            { key: 'shipped', label: 'Shipped', icon: 'fa-truck' },
            { key: 'delivered', label: 'Delivered', icon: 'fa-home' }
        ];

        const statusOrder = ['pending', 'confirmed', 'processing', 'shipped', 'delivered'];
        const currentIndex = statusOrder.indexOf(status);

        return steps.map((step, index) => {
            const isCompleted = index <= currentIndex;
            const isCurrent = index === currentIndex;
            
            return {
                ...step,
                completed: isCompleted,
                current: isCurrent
            };
        });
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
        <div className="track-order-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <h1 className="mb-5">Track Your Order</h1>
                    </div>
                </div>

                {!orderId && (
                    <div className="row mb-5">
                        <div className="col-lg-6 mx-auto">
                            <div className="card">
                                <div className="card-header">
                                    <h5 className="mb-0">Enter Tracking Information</h5>
                                </div>
                                <div className="card-body">
                                    <form onSubmit={handleSearch}>
                                        <div className="mb-3">
                                            <label htmlFor="trackingNumber" className="form-label">Order Number or Tracking Number</label>
                                            <input
                                                type="text"
                                                className="form-control"
                                                id="trackingNumber"
                                                value={trackingNumber}
                                                onChange={(e) => setTrackingNumber(e.target.value)}
                                                placeholder="Enter your order number or tracking number"
                                                required
                                            />
                                        </div>
                                        <button 
                                            type="submit" 
                                            className="btn btn-primary w-100"
                                            disabled={searchLoading}
                                        >
                                            {searchLoading ? (
                                                <>
                                                    <span className="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                                    Tracking...
                                                </>
                                            ) : (
                                                'Track Order'
                                            )}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                )}

                {order ? (
                    <div className="row">
                        <div className="col-lg-8 mx-auto">
                            <div className="card">
                                <div className="card-header">
                                    <div className="row align-items-center">
                                        <div className="col">
                                            <h5 className="mb-1">Order #{order.order_number}</h5>
                                            <small className="text-muted">
                                                Placed on {new Date(order.created_at).toLocaleDateString('en-US', { 
                                                    year: 'numeric', 
                                                    month: 'long', 
                                                    day: 'numeric' 
                                                })}
                                            </small>
                                        </div>
                                        <div className="col-auto">
                                            <span className={`badge bg-${order.status === 'delivered' ? 'success' : order.status === 'cancelled' ? 'danger' : 'primary'}`}>
                                                {order.status?.charAt(0).toUpperCase() + order.status?.slice(1)}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div className="card-body">
                                    {/* Order Progress */}
                                    <div className="mb-4">
                                        <h6 className="mb-3">Order Progress</h6>
                                        <div className="progress-steps">
                                            {getStatusSteps(order.status).map((step, index) => (
                                                <div key={step.key} className={`progress-step ${step.completed ? 'completed' : ''} ${step.current ? 'current' : ''}`}>
                                                    <div className="step-icon">
                                                        <i className={`fa ${step.icon}`}></i>
                                                    </div>
                                                    <div className="step-label">{step.label}</div>
                                                    {index < getStatusSteps(order.status).length - 1 && (
                                                        <div className="step-connector"></div>
                                                    )}
                                                </div>
                                            ))}
                                        </div>
                                    </div>

                                    {/* Order Details */}
                                    <div className="row">
                                        <div className="col-md-6">
                                            <h6>Order Items:</h6>
                                            {order.items?.map((item, index) => (
                                                <div key={index} className="d-flex align-items-center mb-2">
                                                    <img 
                                                        src={`/storage/${item.product?.product_images?.[0]?.image_url}`} 
                                                        className="me-3" 
                                                        style={{ width: '50px', height: '50px', objectFit: 'cover' }}
                                                        alt={item.product?.title}
                                                    />
                                                    <div>
                                                        <div className="fw-bold">{item.product?.title}</div>
                                                        <small className="text-muted">
                                                            Qty: {item.quantity} × ${item.price}.00
                                                        </small>
                                                    </div>
                                                </div>
                                            ))}
                                        </div>
                                        <div className="col-md-6">
                                            <h6>Shipping Information:</h6>
                                            <p className="mb-1"><strong>Address:</strong></p>
                                            <p className="mb-1">{order.shipping_address?.address}</p>
                                            <p className="mb-1">{order.shipping_address?.city}, {order.shipping_address?.state} {order.shipping_address?.zip_code}</p>
                                            <p className="mb-3">{order.shipping_address?.country}</p>
                                            
                                            {order.tracking_number && (
                                                <p className="mb-1">
                                                    <strong>Tracking Number:</strong> {order.tracking_number}
                                                </p>
                                            )}
                                            
                                            <p className="mb-1">
                                                <strong>Total Amount:</strong> ${order.total_amount}.00
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ) : !orderId && (
                    <div className="text-center py-5">
                        <h3>Enter a tracking number to get started</h3>
                        <p>Use the form above to track your order status.</p>
                    </div>
                )}
            </div>
        </div>
    );
};

export default TrackOrder;

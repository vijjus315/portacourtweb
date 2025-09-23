/**
 * My Orders Page Component
 */

import React, { useEffect, useState } from 'react';

const MyOrders = () => {
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        loadOrders();
    }, []);

    const loadOrders = async () => {
        try {
            const res = await window.axios.get('/user-orders');
            setOrders(res.data.orders || []);
        } catch (error) {
            console.error('Error loading orders:', error);
        } finally {
            setLoading(false);
        }
    };

    const getStatusBadge = (status) => {
        const statusClasses = {
            'pending': 'warning',
            'confirmed': 'info',
            'processing': 'primary',
            'shipped': 'info',
            'delivered': 'success',
            'cancelled': 'danger'
        };
        
        return (
            <span className={`badge bg-${statusClasses[status] || 'secondary'}`}>
                {status?.charAt(0).toUpperCase() + status?.slice(1)}
            </span>
        );
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
        <div className="my-orders-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <h1 className="mb-5">My Orders</h1>
                    </div>
                </div>

                {orders.length === 0 ? (
                    <div className="text-center py-5">
                        <h3>No orders found</h3>
                        <p>You haven't placed any orders yet.</p>
                        <a href="/products" className="btn btn-primary">
                            Start Shopping
                        </a>
                    </div>
                ) : (
                    <div className="row">
                        {orders.map(order => (
                            <div key={order.id} className="col-12 mb-4">
                                <div className="card">
                                    <div className="card-header d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 className="mb-1">Order #{order.order_number}</h5>
                                            <small className="text-muted">
                                                Placed on {new Date(order.created_at).toLocaleDateString('en-US', { 
                                                    year: 'numeric', 
                                                    month: 'long', 
                                                    day: 'numeric' 
                                                })}
                                            </small>
                                        </div>
                                        <div>
                                            {getStatusBadge(order.status)}
                                        </div>
                                    </div>
                                    <div className="card-body">
                                        <div className="row">
                                            <div className="col-md-8">
                                                <h6>Order Items:</h6>
                                                {order.items?.map((item, index) => (
                                                    <div key={index} className="d-flex align-items-center mb-2">
                                                        <img 
                                                            src={`/storage/${item.product?.product_images?.[0]?.image_url}`} 
                                                            className="me-3" 
                                                            style={{ width: '50px', height: '50px', objectFit: 'cover' }}
                                                            alt={item.product?.title}
                                                        />
                                                        <div className="flex-grow-1">
                                                            <div className="fw-bold">{item.product?.title}</div>
                                                            <small className="text-muted">
                                                                Qty: {item.quantity} × ${item.price}.00
                                                            </small>
                                                        </div>
                                                    </div>
                                                ))}
                                            </div>
                                            <div className="col-md-4">
                                                <div className="text-end">
                                                    <h6>Order Total: ${order.total_amount}.00</h6>
                                                    <div className="mt-3">
                                                        <button 
                                                            className="btn btn-outline-primary btn-sm me-2"
                                                            onClick={() => window.location.href = `/track-order/${order.id}`}
                                                        >
                                                            Track Order
                                                        </button>
                                                        <button 
                                                            className="btn btn-outline-secondary btn-sm"
                                                            onClick={() => window.location.href = `/order-detail/${order.id}`}
                                                        >
                                                            View Details
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                )}
            </div>
        </div>
    );
};

export default MyOrders;

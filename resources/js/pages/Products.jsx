/**
 * Products Page Component
 */

import React, { useEffect, useState } from 'react';

const Products = () => {
    const [products, setProducts] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function loadProducts() {
            try {
                const res = await window.axios.get('/products');
                setProducts(res.data.products || []);
            } catch (error) {
                console.error('Error loading products:', error);
            } finally {
                setLoading(false);
            }
        }
        loadProducts();
    }, []);

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
        <div className="products-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <h1 className="text-center mb-5">Our Products</h1>
                    </div>
                </div>
                <div className="row">
                    {products.map(product => {
                        const variant = (product.variants && product.variants[0]) || {};
                        const image = (product.product_images && product.product_images[0]) || {};
                        return (
                            <div className="col-md-6 col-lg-4 mb-4" key={product.id}>
                                <div className="card h-100">
                                    <div className="position-relative">
                                        <img 
                                            src={`/storage/${image.image_url}`} 
                                            className="card-img-top" 
                                            alt={product.title}
                                            style={{ height: '250px', objectFit: 'cover' }}
                                        />
                                        <div className="position-absolute top-0 end-0 p-2">
                                            <button 
                                                className="btn btn-outline-danger btn-sm"
                                                data-product-id={product.id}
                                                data-in-wishlist={product.in_wishlist ? '1' : ''}
                                            >
                                                <i className="fa fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div className="card-body d-flex flex-column">
                                        <h5 className="card-title">{product.title}</h5>
                                        <p className="card-text flex-grow-1">
                                            {(product.description || '').replace(/<[^>]*>?/gm, '').substring(0, 100)}...
                                        </p>
                                        <div className="mt-auto">
                                            <div className="d-flex justify-content-between align-items-center mb-3">
                                                <span className="h5 text-primary mb-0">
                                                    ${variant.discounted_price || variant.price || '0'}.00
                                                </span>
                                                {variant.discounted_price && variant.price && (
                                                    <span className="text-muted text-decoration-line-through">
                                                        ${variant.price}.00
                                                    </span>
                                                )}
                                            </div>
                                            <a 
                                                href={`/product-detail/${product.slug}`} 
                                                className="btn btn-primary w-100"
                                            >
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        );
                    })}
                </div>
            </div>
        </div>
    );
};

export default Products;

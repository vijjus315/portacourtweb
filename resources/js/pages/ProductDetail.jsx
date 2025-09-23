/**
 * Product Detail Page Component
 */

import React, { useEffect, useState } from 'react';

// Use React Router DOM from CDN
const { useParams } = window.ReactRouterDOM;

const ProductDetail = () => {
    const { slug } = useParams();
    const [product, setProduct] = useState(null);
    const [loading, setLoading] = useState(true);
    const [selectedVariant, setSelectedVariant] = useState(null);

    useEffect(() => {
        async function loadProduct() {
            try {
                const res = await window.axios.get(`/product-detail/${slug}`);
                setProduct(res.data.product);
                if (res.data.product && res.data.product.variants && res.data.product.variants.length > 0) {
                    setSelectedVariant(res.data.product.variants[0]);
                }
            } catch (error) {
                console.error('Error loading product:', error);
            } finally {
                setLoading(false);
            }
        }
        loadProduct();
    }, [slug]);

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

    if (!product) {
        return (
            <div className="container py-5">
                <div className="text-center">
                    <h1>Product not found</h1>
                    <a href="/products" className="btn btn-primary">Back to Products</a>
                </div>
            </div>
        );
    }

    const primaryImage = (product.product_images && product.product_images[0]) || {};

    return (
        <div className="product-detail-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-md-6">
                        <div className="product-image">
                            <img 
                                src={`/storage/${primaryImage.image_url}`} 
                                className="img-fluid" 
                                alt={product.title}
                            />
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="product-info">
                            <h1 className="mb-3">{product.title}</h1>
                            <div 
                                className="product-description mb-4"
                                dangerouslySetInnerHTML={{ __html: product.description }}
                            />
                            
                            {product.variants && product.variants.length > 0 && (
                                <div className="mb-4">
                                    <h5>Variants:</h5>
                                    <div className="row">
                                        {product.variants.map((variant, index) => (
                                            <div key={index} className="col-md-6 mb-2">
                                                <div 
                                                    className={`card cursor-pointer ${selectedVariant === variant ? 'border-primary' : ''}`}
                                                    onClick={() => setSelectedVariant(variant)}
                                                >
                                                    <div className="card-body">
                                                        <h6>{variant.title || `Variant ${index + 1}`}</h6>
                                                        <div className="d-flex justify-content-between">
                                                            <span className="text-primary fw-bold">
                                                                ${variant.discounted_price || variant.price}.00
                                                            </span>
                                                            {variant.discounted_price && variant.price && (
                                                                <span className="text-muted text-decoration-line-through">
                                                                    ${variant.price}.00
                                                                </span>
                                                            )}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            )}

                            {selectedVariant && (
                                <div className="mb-4">
                                    <div className="d-flex justify-content-between align-items-center mb-3">
                                        <span className="h4 text-primary mb-0">
                                            ${selectedVariant.discounted_price || selectedVariant.price}.00
                                        </span>
                                        {selectedVariant.discounted_price && selectedVariant.price && (
                                            <span className="text-muted text-decoration-line-through">
                                                ${selectedVariant.price}.00
                                            </span>
                                        )}
                                    </div>
                                    <button 
                                        className="btn btn-primary btn-lg w-100"
                                        data-product-id={product.id}
                                        data-variant-id={selectedVariant.id}
                                    >
                                        Add to Cart
                                    </button>
                                </div>
                            )}

                            <div className="product-actions">
                                <button 
                                    className="btn btn-outline-danger me-2"
                                    data-product-id={product.id}
                                    data-in-wishlist={product.in_wishlist ? '1' : ''}
                                >
                                    <i className="fa fa-heart"></i> Add to Wishlist
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ProductDetail;

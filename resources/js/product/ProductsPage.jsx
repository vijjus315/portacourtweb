import React, { useEffect, useMemo, useState } from 'react';
import { createRoot } from 'react-dom/client';
import Header from '../components/Header.jsx';
import Footer from '../components/Footer.jsx';
import LoginModal from '../components/LoginModal.jsx';
import SignupModal from '../components/SignupModal.jsx';
import { getProducts } from '../api/product.js';
import { getImageUrl } from '../utils/imageUtils.js';
import '../bootstrap';

const ProductsPage = () => {
    const [allProducts, setAllProducts] = useState([]);
    const [categories, setCategories] = useState([]);
    const [selectedCategoryIds, setSelectedCategoryIds] = useState([]);
    const [sortBy, setSortBy] = useState(''); // remove 'desc' which responsible for showing filter by default.
    const [priceRange, setPriceRange] = useState([0, 15000]);
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        async function load() {
            try {
                const res = await getProducts(34);
                const apiProducts = res.body || [];


                
                // Transform API data to match expected format
                const transformedProducts = apiProducts.map(product => ({
                    id: product.id,
                    title: product.title,
                    slug: product.slug,
                    average_rating: product.average_rating || 0,
                    category_id: product.cat_id,
                    product_images: product.product_images || [],
                    variants: product.product_variants || [],
                    description: product.description,
                    video: product.video,
                    is_featured: product.is_featured,
                    is_fav: product.is_fav
                }));
                
                setAllProducts(transformedProducts);
                
                // Set categories based on the products
                const uniqueCategories = [...new Set(transformedProducts.map(p => p.category_id))];
                const categoryMap = {
                    1: 'TENNIS BALL COURTS',
                    2: 'PICKLEBALL COURTS', 
                    3: 'SPIKE BALL COURTS'
                };
                
                const categories = uniqueCategories.map(id => ({
                    id: id,
                    title: categoryMap[id] || `Category ${id}`
                }));
                
                setCategories(categories);
            } catch (error) {
                console.error('Failed to load products data', error);
                // Fallback to original dummy data if API fails
                const fallbackProducts = [
                    {
                        id: 'fb-1',
                        title: 'Premium Spike Ball Court',
                        slug: 'premium-spike-ball-court',
                        average_rating: 0,
                        category_id: 3,
                        product_images: [{ image_url: 'https://www.portacourts.com/storage/images/bz80kmVC0wHP1aSYI4AJ3RfifHp36YpDOcAEEURj.jpg' }],
                        variants: [{ price: 5200, discounted_price: 4160 }],
                    },
                    {
                        id: 'fb-2',
                        title: 'Pickleball Court – Standard Court',
                        slug: 'pickleball-court-standard-court',
                        average_rating: 0,
                        category_id: 2,
                        product_images: [{ image_url: 'https://www.portacourts.com/storage/images/LAJbtgX3kexrZLI8fp7yUfQrdPqRf4VLyUdVefD6.jpg' }],
                        variants: [{ price: 7300, discounted_price: 6570 }],
                    },
                    {
                        id: 'fb-3',
                        title: 'Pickleball Court – Premium (with Acrylic Top)',
                        slug: 'pickleball-court-premium-with-acrylic-top',
                        average_rating: 0,
                        category_id: 2,
                        product_images: [{ image_url: 'https://www.portacourts.com/storage/images/ZZFA0LxRbGtSVsLxyeiGzhyvUqCVZlMEBKwhli4W.jpg' }],
                        variants: [{ price: 9800, discounted_price: 8820 }],
                    },
                ];
                setAllProducts(fallbackProducts);
                setCategories([
                    { id: 1, title: 'TENNIS BALL COURTS' },
                    { id: 2, title: 'PICKLEBALL COURTS' },
                    { id: 3, title: 'SPIKE BALL COURTS' },
                ]);
            } finally {
                setIsLoading(false);
            }
        }
        load();
    }, []);

    const toggleCategory = (id) => {
        setSelectedCategoryIds((prev) =>
            prev.includes(id) ? prev.filter((x) => x !== id) : [...prev, id]
        );
    };

    // Filter and sort products
    const filteredProducts = useMemo(() => {
        let list = [...allProducts];


        if (selectedCategoryIds.length) {
            list = list.filter((p) => selectedCategoryIds.includes(String(p.category_id)));
        }
        list = list.filter((p) => {
            const v = (p.variants && p.variants[0]) || {};
            const price = Number(v.price || 0);
            return price >= priceRange[0] && price <= priceRange[1];
        });
        list.sort((a, b) => {
            const va = Number(((a.variants && a.variants[0]) || {}).discounted_price || 0);
            const vb = Number(((b.variants && b.variants[0]) || {}).discounted_price || 0);
            return sortBy === 'asc' ? va - vb : vb - va;
        });
        return list;
    }, [allProducts, selectedCategoryIds, sortBy, priceRange]);

    useEffect(() => {
        // Initialize jQuery UI slider if available to match original design
        try {
            if (window.$ && window.$.fn && typeof window.$.fn.slider === 'function') {
                const [$min, $max] = priceRange;
                const $slider = window.$('#slider-range');
                if ($slider.data('ui-slider')) {
                    $slider.slider('values', 0, $min).slider('values', 1, $max);
                } else {
                    $slider.slider({
                        range: true,
                        min: 0,
                        max: 15000,
                        values: [$min, $max],
                        slide: function (_e, ui) {
                            const [v1, v2] = ui.values;
                            window.$('#amount').val(`$${v1} - $${v2}`);
                            // Just update text; commit on Apply Filter
                        }
                    });
                }
                window.$('#amount').val(`$${$min} - $${$max}`);
            }
        } catch (e) {
            // noop
        }
    }, [priceRange]);

    return (
        <>
        <Header />
        <section className="filter-wrapper py-5">
            <div className="container">
                <div className="row">
                    <div className="col-lg-3">
                        <h3 className="font-oswald mb-3">Filters</h3>
                        <form method="GET" id="filter-form">
                        <div className="filter-inner">
                            <div>
                                <h4 className="font-oswald py-2">Category</h4>
                            </div>
                            <ul className="ps-0 category-listed ms-0" id="category-list">
                                <li className="text-grey font-Yantramanav fw-400 category-item" data-category-id="1">
                                    <input type="checkbox" name="catID[]" value="1" id="category-1" className="category-checkbox" checked={selectedCategoryIds.includes('1')} onChange={() => toggleCategory('1')} />
                                    <label htmlFor="category-1">TENNIS BALL COURTS</label>
                                </li>
                                <li className="text-grey font-Yantramanav fw-400 category-item" data-category-id="2">
                                    <input type="checkbox" name="catID[]" value="2" id="category-2" className="category-checkbox" checked={selectedCategoryIds.includes('2')} onChange={() => toggleCategory('2')} />
                                    <label htmlFor="category-2">PICKLEBALL COURTS</label>
                                </li>
                                <li className="text-grey font-Yantramanav fw-400 category-item" data-category-id="3">
                                    <input type="checkbox" name="catID[]" value="3" id="category-3" className="category-checkbox" checked={selectedCategoryIds.includes('3')} onChange={() => toggleCategory('3')} />
                                    <label htmlFor="category-3">SPIKE BALL COURTS</label>
                                </li>
                            </ul>

                            <div>
                                <h4 className="font-oswald py-2">Shop By Price</h4>
                                <div className="price-range-slider pt-4">
                                    <div id="slider-range" className="range-bar"></div>
                                    <div className="d-flex align-items-center mt-3 justify-content-between">
                                        <h6 className="price-filter">Prices Range</h6>
                                        <p className="range-value primary-theme">
                                            <input type="text" id="amount" readOnly />
                                            <input type="hidden" name="min_price" id="min-price" value={priceRange[0]} />
                                            <input type="hidden" name="max_price" id="max-price" value={priceRange[1]} />
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 className="font-oswald pb-2 pt-3">Sort By</h3>
                            </div>
                            <ul className="ps-0 category-listed" id="sort-list">
                                <li className="text-grey font-Yantramanav fw-400 sort-item" data-sort-by="desc">
                                    <input type="radio" name="sort_by" id="sort-desc" checked={sortBy === 'desc'} onChange={() => setSortBy('desc')} className="sort-radio" value="desc" />
                                    <label htmlFor="sort-desc" class="form-check-label ms-1">High to Low</label>
                                </li>
                                <li className="text-grey font-Yantramanav fw-400 sort-item" data-sort-by="asc">
                                    <input type="radio" name="sort_by" id="sort-asc" checked={sortBy === 'asc'} onChange={() => setSortBy('asc')} className="sort-radio" value="asc" />
                                    <label htmlFor="sort-asc" class="form-check-label ms-1">Low to High</label>
                                </li>
                            </ul>

                            <button type="submit" className="green-btn w-100 mt-3">Apply Filter</button>
                        </div>
                        </form>
                    </div>

                    <div className="col-lg-9">
                        <h3 className="font-oswald mb-3">Products</h3>
                        {(selectedCategoryIds.length > 0 || sortBy) && (
                            <div className="productfilter d-flex align-items-baseline gap-2">
                                <p className="fw-500 mb-0 lh-1">Filter:</p>
                                <div className="d-flex gap-2 align-items-center flex-wrap" id="applied-filters">
                                    {selectedCategoryIds.map(id => {
                                        const c = categories.find(x => String(x.id) === String(id));
                                        if (!c) return null;
                                        return (
                                            <button
                                                key={id}
                                                className="border-0 filterbtn primary-theme fw-400 font-Yantramanav d-flex align-items-center gap-2"
                                                onClick={() => toggleCategory(String(id))}
                                            >
                                                <span>{c.title}</span>
                                                <img src={`${window.location.origin}/webassets/img/crossfilter.svg`} />
                                            </button>
                                        );
                                    })}
                                    {sortBy && (
                                        <button
                                            className="border-0 filterbtn primary-theme fw-400 font-Yantramanav d-flex align-items-center gap-2"
                                            onClick={() => setSortBy('')}
                                        >
                                            <span>{sortBy === 'desc' ? 'High to Low' : 'Low to High'}</span>
                                            <img src={`${window.location.origin}/webassets/img/crossfilter.svg`} />
                                        </button>
                                    )}
                                    <a
                                        className="border-0 clear-filter fw-400 font-Yantramanav d-flex align-items-center gap-2"
                                        href="/products"
                                        onClick={(e) => { e.preventDefault(); setSelectedCategoryIds([]); setSortBy(''); setPriceRange([0, 15000]); }}
                                    >
                                        Clear All Filter
                                    </a>
                                </div>
                            </div>
                        )}
                        <div className="row pt-4">
                            {isLoading ? (
                                <div className="d-flex mx-auto justify-content-center align-items-center my-5 h-100">
                                    <div className="text-center">
                                        <div className="spinner-border text-primary" role="status" style={{ width: '3rem', height: '3rem' }}>
                                            <span className="visually-hidden">Loading...</span>
                                        </div>
                                        <p className="mt-3 text-muted">Loading products...</p>
                                    </div>
                                </div>
                            ) : filteredProducts.length === 0 ? (
                                <div className="d-flex mx-auto justify-content-center align-items-center my-5 h-100">
                                    <img src={`${window.location.origin}/webassets/img/wishlist-empty.png`} className=" no-data-found" />
                                </div>
                            ) : (
                                filteredProducts.map((p) => {
                                const image = (p.product_images && p.product_images[0]) || {};
                                const item = (p.variants && p.variants[0]) || {};
                                const imgSrc = getImageUrl(image.image_url);
                                return (
                                    <div className="col-md-6 col-xl-4 mb-3" key={p.id}>
                                        {/* /product-detail */}
                                        <a href={`/product-detail/${p.slug}?id=${p.id}`} className="text-decoration-none">
                                            <div className="feature-pro">
                                                <div className="product-feature-img product-bg position-relative">
                                                    <img alt="product_images" src={imgSrc} className="img-fluid product-pic" />

                                                    {/* <img alt="product_images" src={imgSrc} className="img-fluid product-pic" /> */}
                                                    <a className="icon-wish-product addwishlist" data-product-id={p.id}>
                                                        <img src={`${window.location.origin}/webassets/img/unfillwishlist.svg`} className="wishlist-icon" />
                                                    </a>
                                                </div>
                                                <div className="px-3 py-4 text-black">
                                                    <h3 className="text-capitalize mb-2 fw-400 one-line text-black">{p.title}</h3>
                                                    <div className="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <p className="mb-0">
                                                                <span className="primary-theme price-offer">${item.discounted_price || ''}.00</span>
                                                                <span className="ms-2 price-old">${item.price || ''}.00</span>
                                                            </p>
                                                            <div className="d-flex align-items-center gap-1">
                                                                {[...Array(5)].map((_, i) => (
                                                                    <i
                                                                        key={i}
                                                                        className={i < Math.floor(p.average_rating || 0) ? 'fa fa-star' : 'fa fa-star-o'}
                                                                        aria-hidden="true"
                                                                    ></i>
                                                                ))}
                                                            </div>
                                                        </div>
                                                        <img src={`${window.location.origin}/webassets/img/cart.svg`} />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                );
                                })
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        {/* Login and Signup Modals */}
        <LoginModal />
        <SignupModal />
        
        <Footer />
        </>
    );
};

export default ProductsPage;
// Auto-mount when included directly as a script module
if (typeof window !== 'undefined') {
    const el = document.getElementById('react-products-root');
    if (el) {
        const root = createRoot(el);
        root.render(<ProductsPage />);
    }
}

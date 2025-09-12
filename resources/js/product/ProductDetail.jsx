import React, { useEffect, useMemo, useState } from 'react';
import { createRoot } from 'react-dom/client';
import '../bootstrap';
import Header from '../components/Header.jsx';
import Footer from '../components/Footer.jsx';
import Reviews from '../components/Reviews.jsx';
import CustomCourtModal from '../components/CustomCourtModal.jsx';

function getSlugFromLocation() {
    try {
        const parts = (window.location.pathname || '').split('/').filter(Boolean);
        const idx = parts.findIndex(p => p === 'product-detail');
        if (idx !== -1 && parts[idx + 1]) return parts[idx + 1];

        const el = document.getElementById('react-product-detail-root');
        if (el && el.dataset && el.dataset.slug) return el.dataset.slug;
    } catch (_) {}
    return '';
}

// Dummy product list
const DUMMY_PRODUCTS = [
  {
    id: 'fb-1',
    title: 'Premium Spike Ball Court',
    slug: 'premium-spike-ball-court',
    average_rating: 0,
    category: { id: 3, title: 'SPIKE BALL COURTS' },
    product_images: [
      { image_url: 'https://www.portacourts.com/storage/images/bz80kmVC0wHP1aSYI4AJ3RfifHp36YpDOcAEEURj.jpg' },
      { image_url: 'https://www.portacourts.com/storage/images/MwOWDU6u3gZWw2xGZKLhzMEtaTrD1uCWNzeOxZr7.jpg' },
      { image_url: 'https://www.portacourts.com/storage/images/1mwIKdn4x9UgwWgKeZYBMTXUfISXhMC79Zvndj93.jpg' },
      { image_url: 'https://www.portacourts.com/storage/images/LXgJdOo0LJenoJGkcrXbs2tDDhFmuzV8aYmk4YRg.jpg' },
      { image_url: 'https://www.portacourts.com/storage/images/VdVUqOQYn0r9MzeM0xMS1GSClVPWv7VSfzixU004.jpg' },
      { image_url: 'https://www.portacourts.com/storage/images/3NQISPIM4mEq7dIlUy7QFFdMNwRNcid5wZ9u7OuA.jpg' },
      { image_url: 'https://www.portacourts.com/storage/images/yUitO7Vwhio6cW6v4RuGTxAQj6gB0lkyqFwEaHps.jpg' },
    ],
    variants: [
      {
        type: "standard",
        price: 5200,
        discounted_price: 4160,
        length: 20,
        width: 10,
        thickness: 30,
        discount: 20,
      },
      {
        type: "shipping",
        domestic: "Flat fee of $350 within the U.S.",
        international: "International shipping available (email for quote).",
      },
      {
        type: "preOrder",
        offer: "10% OFF on Pre-Orders",
        expectedDelivery: "Early October 2025 or earlier",
      },
    ],
    description: `<p>What if your workout could feel more like play? With our portable Spikeball Courts, you can make every session the most exciting part of your day. Our professional-grade courts are scientifically designed to provide superior bounce and stability, offering the finest experience in each rally. Lightweight material and tool-free assembly ensure that you can have your court ready on the go with no hassle. Plus, with a minimum service life of 3-5 years, you won't have to worry about wear and tear, even in the harshest conditions.</p>`,
    video: null,
  },
];

const reviews = [
  {
    id: 1,
    name: "dan",
    date: "Sep, 09 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/oj9fKCumwc4RGvo.png",
    rating: 5,
    comment: "Test rating",
  },
  {
    id: 2,
    name: "Test1245",
    date: "Sep, 09 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/j8sn2Kst6aq6rci.png",
    rating: 2,
    comment: "Nyc",
  },
  {
    id: 3,
    name: "Test1245",
    date: "Sep, 09 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/j8sn2Kst6aq6rci.png",
    rating: 2,
    comment: "tesing",
  },
  {
    id: 4,
    name: "Test1245",
    date: "Sep, 09 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/j8sn2Kst6aq6rci.png",
    rating: 5,
    comment: "Good court",
  },
  {
    id: 5,
    name: "Tushar",
    date: "Jul, 01 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/bLYYkkfq8o2VXXw.png",
    rating: 5,
    comment: "Tui",
  },
  {
    id: 6,
    name: "Tushar",
    date: "Jul, 01 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/bLYYkkfq8o2VXXw.png",
    rating: 5,
    comment: "Yujjjhjjhhbhjj",
  },
  {
    id: 7,
    name: "dan",
    date: "Jun, 26 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/oj9fKCumwc4RGvo.png",
    rating: 3,
    comment: "Ff",
  },
  {
    id: 8,
    name: "dan",
    date: "Jun, 26 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/oj9fKCumwc4RGvo.png",
    rating: 3,
    comment: "Ssd",
  },
  {
    id: 9,
    name: "dan",
    date: "Jun, 26 2025",
    profile:
      "https://www.portacourts.com/storage/https://portacourts.s3.us-east-2.amazonaws.com/uploads/oj9fKCumwc4RGvo.png",
    rating: 2,
    comment: "Nice product",
  },
];


const ProductDetail = () => {
    const [allProducts, setAllProducts] = useState([]);
    const [product, setProduct] = useState(null);
    const [activeImageIdx, setActiveImageIdx] = useState(0);
    const [activeVariantIdx, setActiveVariantIdx] = useState(0);
    const [quantity, setQuantity] = useState(1);
    // const [review, setReview] = useState(0);
    const [showCourtModal, setShowCourtModal] = useState(false);

    const handleModal = () => {
        setShowCourtModal(true);
    }

    useEffect(() => {
        // Load dummy data instead of API
        const list = DUMMY_PRODUCTS;
        setAllProducts(list);

        const slug = getSlugFromLocation();
        const found = list.find(p => p.slug === slug) || list[0] || null;
        setProduct(found);
    }, []);

    const images = useMemo(() => {
        if (!product) return [];
        const imgs = product.product_images || [];
        return imgs.map(i => (i.image_url.startsWith('http') ? i.image_url : `/storage/${i.image_url}`));
    }, [product]);

    const variant = useMemo(() => {
        if (!product) return {};
        const arr = product.variants || [];
        return arr[activeVariantIdx] || arr[0] || {};
    }, [product, activeVariantIdx]);

    if (!product) {
        return (
            <section className="py-5">
                <div className="container"><p>Loading product...</p></div>
            </section>
        );
    }


    return (
        <>
            <Header />
            {/* Main Product Section */}
            <section className="py-5">
                <div className="container">
                    <div className="row">

                        {/* LEFT COLUMN: Product Image Gallery */}
                        <div className="col-lg-6">
                            <div className="slider">
                                <div className="slider__flex ">

                                    {/* Thumbnails */}
                                    <div className="slider__col">
                                        <div className="slider__thumbs">
                                            <div className="swiper-container overflow-scroll">
                                                <div className="swiper-wrapper thumbnail-slider d-flex flex-lg-column gap-0.5">
                                                    {images.map((src, idx) => (
                                                        <div key={idx} className="swiper-slide" onClick={() => setActiveImageIdx(idx)} 
                                                        style={{cursor:'pointer', 
                                                            color: "#0d6efd", 
                                                            border: idx === activeImageIdx ? "2px Solid blue" : "1px solid #ccc",
                                                        }}>
                                                            <div className="slider__image">
                                                                <img src={src} className="img-fluid d-block" />
                                                            </div>
                                                        </div>
                                                    ))}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {/* Main Image */}
                                    <div className="slider__images" style={{ height: "400px" }}>
                                        <div className="swiper-container border">
                                            <div className="swiper-wrapper ">
                                                <div className="swiper-slide">
                                                    <div className="slider__image ">
                                                        <img src={images[activeImageIdx]}
                                                        className="img-fluid"
                                                        style={{ height: "550px", objectFit: "cover", width: "100%" }}
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* RIGHT COLUMN: Product Info */}
                        <div className="col-lg-6 mt-4 mt-lg-0">
                            <div className="product-slider-detail">
                                <h2 className="fw-400 mb-3 product-name">{product.title}</h2>

                                <div className="d-flex align-items-center gap-4 mb-3">
                                    <div className="rating-product">
                                        {/* {[...Array(5)].map((_, i) => (
                                            <i key={i} className={i < Math.floor(product.average_rating || 0) ? 'fa fa-star': 'https://www.portacourts.com/webassets/img/grey-star.svg'} />
                                        ))} */}
                                        {[...Array(5)].map((_, i) => i < Math.floor(product.average_rating || 0) ? (
                                            <i key={i} className="fa fa-star" />
                                        ) : (
                                        <img key={i} 
                                        src="https://www.portacourts.com/webassets/img/grey-star.svg"
                                        alt="grey star" className="star-icon"
                                        />
                                        )
                                        )}
                                    </div>
                                </div>

                                <hr />

                                {/* Variant Size */}
                                <h6 className="mb-2 fw-700 f20">Size</h6>
                                <div className="variant-select-not">
                                    <div className="variant-box position-relative">
                                        <div className="variant-data">
                                            {variant.length} ft X {variant.width} ft X {variant.thickness} mm
                                        </div>
                                    </div>
                                </div>
                                <hr />

                                {/* Pricing */}
                                <div className="d-flex align-items-center gap-2 mb-3 flex-wrap">
                                    <h1 className=" mb-0 product-price sky-blue-text fw-500">${variant.discounted_price}.<span className="f18-size">00</span></h1>
                                    <h3 className="mb-0 price-strike fw-400 font-Yantramanav">${variant.price}.00</h3>
                                    {!!variant.discount && (<p className="green-btn mb-0 savepro-btn fw-400">Save {variant.discount}%</p>)}
                                    <p className="productvariant mb-3"><b>Shipping:</b><br/> Flat fee of $350 within the U.S.<br/> International shipping available (email for quote).<br/><b>Pre-Order Offer:</b><br/>✅ 10% OFF on Pre-Orders<br/>📦 Expected Delivery: Early October 2025 or earlier</p>
                                </div>
                                <hr />

                                {/* Category */}
                                <h6 className="mb-2 fw-700 f20 ">Category</h6>
                                <div className="d-flex align-items-center gap-3 mb-3">
                                    <p className="fw-400 f20 mb-0">{(product.category && product.category.title) || ''}</p>
                                </div>

                                {/* Quantity */}
                                <h6 className="mb-3 fw-700 f20 ">Quantity</h6>
                                <div className="mt-3 mb-4 d-flex align-items-center gap-2">
                                    <span className="minus-pro" onClick={() => setQuantity(q => Math.max(1, q - 1))}><i className="fa fa-minus"></i></span>
                                    <span className="num">{String(quantity).padStart(2,'0')}</span>
                                    <span className="plus-pro" onClick={() => setQuantity(q => q + 1)}><i className="fa fa-plus"></i></span>
                                </div>

                                {/* Action Buttons */}
                                <div className="gap-5 quantity-wrapper py-4">
                                    <div className="mt-3 mt-sm-0 edit-wrapper  d-block align-items-center  d-sm-flex gap-4">
                                        <button onClick={handleModal} className="green-btn f16 " type="button">Request Custom Court</button>
                                        <a className="green-btn f16" href="/cart">Buy Now</a>
                                        <a className=" addwishlist topwish-list">
                                            <img src={`${window.location.origin}/webassets/img/unfillwishlist.svg`} className="wishlist-icon" />
                                        </a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    {/* Bottom Section: Description & Reviews */}
                    <div className="row mt-3">
                        <div className="col-12">
                            <div className="description-product">
                                <nav>
                                    <div className="nav nav-tabs mb-3 border-0" id="nav-tab" role="tablist">
                                        <button 
                                        className="font-oswald fw-500 bg-transparent nav-link active"
                                        id="description-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#description"
                                        type="button"
                                        role="tab"
                                        aria-controls="description"
                                        aria-selected="true"
                                        >
                                            <h3>Description</h3>
                                        </button>
                                        
                                        <button
                                        className="font-oswald fw-500 bg-transparent nav-link"
                                        id="review-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#review"
                                        type="button"
                                        role="tab"
                                        aria-controls="review"
                                        aria-selected="false"
                                        >
                                            <h3>Reviews</h3>
                                        </button>
                                    </div>
                                </nav>
                                <div className="tab-content" id="nav-tabContent">
                                    
                                    {/* Description Tab */}
                                <div className="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div className="row">
                                        <div className={product.video ? 'col-lg-7' : 'col-lg-12'}>
                                            <p 
                                            className="fw-400 f16 font-Yantramanav lh-lg"
                                            dangerouslySetInnerHTML={{ __html: product.description || '' }}
                                            />
                                        </div>
                                        {product.video && (
                                        <div className="col-lg-5 mt-3 mt-lg-0">
                                            <video height="365" controls style={{ width: '100%' }}>
                                                <source src={`/storage/${product.video}`} type="video/mp4" />
                                            </video>
                                        </div>
                                        )}
                                    </div>
                                </div>
                                {/* Reviews Tab */}
                                <Reviews />
                                
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            {/* court modal */}
            {showCourtModal && <CustomCourtModal onClose={() => setShowCourtModal(false)} />}
            <Footer />
        </>
    );
};

export default ProductDetail;

if (typeof window !== 'undefined') {
    const el = document.getElementById('react-product-detail-root');
    if (el) {
        const root = createRoot(el);
        root.render(<ProductDetail />);
    }
}





// {/* <div className="tab-pane fade" 
//                                     id="review" role="tabpanel" 
//                                     aria-labelledby="review-tab"
//                                 >
//                                     <div className="row mt-4 mb-5">
//                                       <div className="col-12 col-lg-6 p-3">
//                                         {/* Header + Sort */}
//                                         <div className="row pb-3 pb-md-4 pt-md-0 align-items-center comment-text">
//                                           <div className="col-md-6">
//                                             <h5 className="mb-0 fw-500 f18">All Reviews ({reviews.length})</h5>
//                                           </div>
                                          
//                                           <div className="col-md-6 pt-3 pt-md-0">
//                                             <div className="sort-drop text-end gap-2">
//                                                 <p className="sort-text mb-0">Sort by :</p>
//                                               <div className="dropdown">
//                                                 <button className="btn dropdown-toggle drop-btn-sort fw-500 border-0"
//                                                 type="button" id="newest-dropdown"
//                                                 data-bs-toggle="dropdown"
//                                                 aria-expanded="false"
//                                                 >
//                                                     Newest
//                                                 </button>
//                                                 <ul className="dropdown-menu" aria-labelledby="newest-dropdown">
//                                                     <li>
//                                                         <a className="dropdown-item" 
//                                                         href="https://www.portacourts.com/product-detail/premium-spike-ball-court?filter=newest"
//                                                         >
//                                                             Newest
//                                                         </a>
//                                                     </li>
//                                                     <li>
//                                                         <a className="dropdown-item" 
//                                                         href="https://www.portacourts.com/product-detail/premium-spike-ball-court?filter=oldest"
//                                                         >
//                                                             Oldest
//                                                         </a>
//                                                     </li>
//                                                 </ul>
//                                               </div>
//                                             </div>
//                                           </div>
//                                         </div>
//                                         {/* Reviews List */}
//                                         {reviews.map((review) => (
//                                           <div className="comment-section" key={review.id}>
//                                             <div className="comment-inner-box">
//                                               <div>
//                                                 <img src={review.profile}
//                                                    alt="User Profile"
//                                                    className="profile-comment"
//                                                 />
//                                               </div>
//                                               <div className="d-flex justify-content-between w-100">
//                                                 <div className="profile-name-comment">
//                                                   <p className="f16 fw-500 text-black mb-0 lh-0">{review.name}</p>
//                                                   <p className="mb-0 fw-400 lh-0 mt-4">{review.date}</p>
//                                                   <div className="star-comment mt-2">
//                                                     {[...Array(5)].map((_, i) => (
//                                                       <img key={i} src={i < review.rating 
//                                                         ? "https://www.portacourts.com/webassets/img/yellow-star.svg" 
//                                                         : "https://www.portacourts.com/webassets/img/grey-star.svg"}
//                                                         alt=""
//                                                       />
//                                                     ))}
//                                                   </div>
//                                                 </div>
//                                                 <div className="edit-drop-review">
//                                                   <div className="dropdown">
//                                                     <button className="btn" 
//                                                     type="button" id={`dropdownMenuButton-${review.id}`} 
//                                                     data-bs-toggle="dropdown" 
//                                                     aria-expanded="false"
//                                                     >
//                                                         <img 
//                                                         src="https://www.portacourts.com/webassets/img/hori-dots.svg" 
//                                                         alt=""
//                                                         />
//                                                     </button>
//                                                   </div>
//                                                 </div>
//                                               </div>
//                                             </div>
//                                             <p className="mb-0 fw-400 text-black pt-2 pt-sm-3 line-24 f16 description-div3">
//                                                 {review.comment}
//                                             </p>
//                                           <hr />
//                                         </div>
//                                        ))}
//                                     </div>
                                    
//                                     {/* Right Side: Review Form */}
//                                     <div className="col-12 col-lg-6 p-3">
//                                       <div className="review-user">
//                                         <div className="mt-2">
//                                           <div className="px-4">
//                                             <div className="mb-3 position-relative">
//                                                 <label className="fw-500 mb-2">Ratings</label>
//                                                 <div className="d-flex justify-content-start gap-3 align-items-center">
//                                                     <i className="cus-star-icon unfillstar fa fa-star" data-value="1" aria-hidden="true"></i>
//                                                     <i className="cus-star-icon unfillstar fa fa-star" data-value="2" aria-hidden="true"></i>
//                                                     <i className="cus-star-icon unfillstar fa fa-star" data-value="3" aria-hidden="true"></i>
//                                                     <i className="cus-star-icon unfillstar fa fa-star" data-value="4" aria-hidden="true"></i>
//                                                     <i className="cus-star-icon unfillstar fa fa-star" data-value="5" aria-hidden="true"></i>
//                                                 </div>
//                                                 <input type="hidden" id="rating" name="rating" value="0" />
//                                                 <input type="hidden" id="product_id" name="product_id" value="4" />
//                                             </div>
//                                             <div className="mb-4 position-relative">
//                                               <label className="fw-500 mb-2" htmlFor="comment">Your review</label>
//                                               <textarea id="comment"
//                                               className="form-control delivary-input pwd-field pe-5 bg-white border-0 resize-none"
//                                               placeholder="Write your review" 
//                                               rows="8"
//                                               >
//                                               </textarea>
//                                             </div>
//                                             <button type="button" id="submitReview" className="btn green-btn w-100 mt-2">
//                                                 Submit Review
//                                             </button>
//                                             </div>
//                                         </div>
//                                       </div>
//                                     </div>
//                                 </div>
//                               </div> */}
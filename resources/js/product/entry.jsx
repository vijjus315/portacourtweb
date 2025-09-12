import { mountProducts, mountProductDetail } from '../product/index.js';
import { mountAboutUs } from "../about/index.js";
import { mountContactUs } from '../contact/index.js';
import { mountCart, mountWish } from '../cart/index.js';
import { mountTrackOrder } from '../trackOrder/index.js';
import { mountBlog, mountBlogDetail } from '../blog/index.js';

document.addEventListener('DOMContentLoaded', () => {
    try {
        console.log('[entry] DOM ready. Mounting product pages...');
        mountProducts('react-products-root');
        mountProductDetail('react-product-detail-root');
        mountAboutUs('react-about-root');
        mountContactUs('react-contact-root');
        mountCart('react-carts-root');
        mountWish('react-wish-root');
        mountTrackOrder('react-track-root');
        mountBlog('react-blogs-root');
        mountBlogDetail('react-blog-detail-root');
    } catch (e) {
        console.error('[entry] mount error', e);
    }
});

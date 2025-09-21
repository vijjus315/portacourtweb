/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other libraries. It is a great starting point when
 * building robust, powerful web applications using React and Laravel.
 */

import './bootstrap';

/**
 * This is the main entry point for the application.
 * It imports the necessary modules and initializes the React components.
 */

// Import main application entry point
import './main.jsx';

/**
 * Additional imports for specific pages and components
 * These are loaded dynamically based on the current page
 */

// Import React components for different pages
import './home.jsx';
import './product/ProductsPage.jsx';
import './product/ProductDetail.jsx';
import './cart/Cart.jsx';
import './cart/WishList.jsx';
import './contact/ContactUs.jsx';
import './blog/Blog.jsx';
import './about/AboutUs.jsx';
import './trackOrder/TrackOrder.jsx';
import './orders/MyOrders.jsx';
import './address/Address.jsx';

// Import authentication components
import './login.jsx';
import './signup.jsx';

/**
 * The application is now ready to run.
 * All React components will be mounted automatically based on their respective HTML containers.
 */

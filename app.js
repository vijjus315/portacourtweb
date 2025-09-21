/**
 * Main application entry point
 * This file serves as the primary entry point for the PortaCourts application
 */

import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";

// Dev-only rewrites so /products and /product-detail/* open their pages
const rewritesPlugin = {
    name: "custom-rewrites",
    configureServer(server) {
        server.middlewares.use((req, _res, next) => {
            if (!req.url) return next();
            if (req.url === "/products") {
                req.url = "/products/index.html";
            } else if (req.url.startsWith("/product-detail")) {
                req.url = "/product-detail/index.html";
            } else if (req.url.startsWith("/about-us")) {
                req.url = "/about-us/index.html";
            } else if (req.url.startsWith("/contact-us")) {
                req.url = "/contact-us/index.html";
            } else if (req.url.startsWith("/blog")) {
                req.url = "/blog/index.html";
            } else if (req.url.startsWith("/blog-detail")) {
                req.url = "/blogs-detail/index.html";
            } else if (req.url.startsWith("/cart")) {
                req.url = "/cart/index.html";
            } else if (req.url.startsWith("/wishlist")) {
                req.url = "/wish-list/index.html";
            } else if (req.url.startsWith("/track-orders")) {
                req.url = "/track-order/index.html";
            } else if (req.url.startsWith("/myorders")) {
                req.url = "/myorders/index.html";
            } else if (req.url.startsWith("/my-address")) {
                req.url = "/address/index.html";
            }
            next();
        });
    },
};

export default defineConfig({
    plugins: [react(), rewritesPlugin],
    server: {
        port: 3000,
        host: true
    },
    build: {
        rollupOptions: {
            input: {
                main: "index.html",
                products: "products/index.html",
                productDetail: "product-detail/index.html",
                aboutUs: "about-us/index.html",
                contactUs: "contact-us/index.html",
                blog: "blog/index.html",
                blogDetail: "blogs-detail/index.html",
                Cart: "cart/index.html",
                myOrders: "myorders/index.html",
                address: "address/index.html",
            },
        },
    },
});

/**
 * Application configuration and setup
 * This ensures all routes and components are properly configured
 */

// Export configuration for use in other parts of the application
export { rewritesPlugin };

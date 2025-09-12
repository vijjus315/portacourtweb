import React from "react";
import { createRoot } from "react-dom/client";
import ProductsPage from "./ProductsPage.jsx";
import ProductDetail from "./ProductDetail.jsx";

export function mountProducts(selector = "react-products-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<ProductsPage />);
}

export function mountProductDetail(selector = "react-product-detail-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<ProductDetail />);
}

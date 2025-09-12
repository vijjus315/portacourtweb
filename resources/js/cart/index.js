import React from "react";
import { createRoot } from "react-dom/client";
import Cart from "./Cart";
import Wishlist from "./Wishlist";

export function mountCart(selector = "react-carts-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<Cart />);
}

export function mountWish(selector = "react-wish-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<Wishlist />);
}

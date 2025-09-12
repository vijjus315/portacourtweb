import React from "react";
import { createRoot } from "react-dom/client";
import Blog from "./Blog";
import BlogDetail from "./BlogDetail";

export function mountBlog(selector = "react-blogs-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<Blog />);
}

export function mountBlogDetail(selector = "react-blog-detail-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<BlogDetail />);
}

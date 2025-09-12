import React from "react";
import { createRoot } from "react-dom/client";
import AboutUs from "./AboutUs";

export function mountAboutUs(selector = "react-about-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<AboutUs />);
}

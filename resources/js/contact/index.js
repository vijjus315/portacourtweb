import React from "react";
import { createRoot } from "react-dom/client";
import ContactUs from "./ContactUs";

export function mountContactUs(selector = "react-contact-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<ContactUs />);
}

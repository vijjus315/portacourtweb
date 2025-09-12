import React from "react";
import { createRoot } from "react-dom/client";
import TrackOrder from "./TrackOrder";

export function mountTrackOrder(selector = "react-track-root") {
    const el = document.getElementById(selector);
    if (!el) return;
    const root = createRoot(el);
    root.render(<TrackOrder />);
}

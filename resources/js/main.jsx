import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import App from '../../app.jsx';

// Mount the main App component
const mountEl = document.getElementById('app');
if (mountEl) {
    const root = createRoot(mountEl);
    root.render(<App />);
}

// Keep the existing home.jsx mounting for backward compatibility
import './home.jsx';


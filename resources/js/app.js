import './bootstrap';
import '../css/app.css';

import React from 'react';
import { createRoot } from 'react-dom/client';
import ProductShowcase from './Components/ProductShowcase';
import LandingPage from './Components/LandingPage'; // Pastikan penamaan file sesuai case-sensitive

// Kode ini mencari div dengan id "react-product-root" di file blade
const rootElement = document.getElementById('react-product-root');

if (rootElement) {
    // Ambil data produk yang dikirim dari Controller/Blade
    const products = JSON.parse(rootElement.getAttribute('data-products'));
    
    const root = createRoot(rootElement);
    root.render(<ProductShowcase products={products} />);
}
if (rootElement) {
        const products = JSON.parse(rootElement.getAttribute('data-products'));
        const root = createRoot(rootElement);
        // Ganti ProductShowcase jadi LandingPage
        root.render(<LandingPage products={products} />);
}
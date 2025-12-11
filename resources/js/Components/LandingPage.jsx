import React from 'react';
import Header from 'Header.jsx';
import ProductShowcase from './ProductShowcase.jsx';

export default function LandingPage({ products }) {
    return (
        <div className="bg-white min-h-screen text-black">
            {/* 1. Navbar Resizable */}
            <Header />

            {/* 2. Hero Section (Banner) */}
            <section id="home" className="pt-40 pb-20 text-center px-4">
                <h1 className="text-6xl font-bold mb-6 text-neutral-900">
                    Gantungan Kunci <span className="text-pink-500">Rajut</span>
                </h1>
                <p className="text-xl text-neutral-500 max-w-2xl mx-auto mb-8">
                    Temani harimu dengan sentuhan imut. Handmade dengan cinta untuk kamu yang spesial.
                </p>
                <a href="#produk" className="px-8 py-3 bg-pink-500 text-white rounded-full font-bold shadow-lg hover:bg-pink-600 transition">
                    Lihat Koleksi
                </a>
            </section>

            {/* 3. Produk (Aceternity Spotlight) */}
            <section id="produk" className="bg-neutral-900 py-20 rounded-t-[3rem]">
                <h2 className="text-4xl font-bold text-center text-white mb-12">Koleksi Terbaru</h2>
                <ProductShowcase products={products} />
            </section>

             {/* Footer dll bisa ditambah di sini */}
        </div>
    );
}
import React, { useState } from "react";
import { Navbar, NavBody, NavItems, NavbarLogo, MobileNav } from "./Navbar";

export default function Header() {
    const [open, setOpen] = useState(false);

    const navLinks = [
        { name: "Home", link: "#home" },
        { name: "Produk", link: "#produk" },
        { name: "Tentang", link: "#tentang" },
        { name: "Kontak", link: "#kontak" },
    ];

    return (
        <Navbar>
            {/* Tampilan Desktop */}
            <NavBody>
                <div className="flex items-center gap-4">
                    <NavbarLogo />
                </div>
                
                <NavItems items={navLinks} />

                <div className="flex items-center gap-2">
                   <a href="/login" className="px-5 py-2 text-sm font-bold rounded-full bg-black text-white hover:bg-neutral-800 transition">
                        Login
                   </a>
                </div>
            </NavBody>

            {/* Tampilan Mobile */}
            <MobileNav isOpen={open} setIsOpen={setOpen}>
                {navLinks.map((item, idx) => (
                    <a 
                        key={idx} 
                        href={item.link} 
                        className="text-lg font-medium text-neutral-700 py-2 border-b border-gray-100 last:border-0"
                    >
                        {item.name}
                    </a>
                ))}
                 <a href="/login" className="mt-2 text-center w-full py-3 rounded-xl bg-pink-500 text-white font-bold">
                    Login Admin
                </a>
            </MobileNav>
        </Navbar>
    );
}
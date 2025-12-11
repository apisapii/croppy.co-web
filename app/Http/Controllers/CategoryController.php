<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str; // <-- Wajib ada biar bisa bikin slug otomatis

class CategoryController extends Controller
{
    public function index()
{
    // Ambil semua data kategori dari database
    $categories = Category::all();
    
    // Kirim datanya ke tampilan (view)
    return view('admin.categories.index', compact('categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi: Nama tidak boleh kosong
    $request->validate([
        'name' => 'required',
    ]);

    // 2. Simpan ke Database
    Category::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name), // Bikin slug otomatis (Boneka Rajut -> boneka-rajut)
    ]);

    // 3. Balik ke halaman daftar kategori
    return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name) // Update slug juga biar sesuai nama baru
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}

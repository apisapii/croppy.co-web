<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- Wajib ada buat hapus foto nanti
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data produk beserta nama kategorinya
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg', // Wajib gambar, tanpa batas maksimal
        ]);

        // 2. Proses Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder 'public/products'
            // Nanti filenya akan punya nama acak yang unik dari Laravel
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 3. Simpan ke Database
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imagePath, // Simpan alamat gambarnya saja
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
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
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Kita butuh ini buat dropdown kategori
        
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        // 1. Validasi
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg', // Pakai 'nullable', tanpa batas maksimal
        ]);

        // 2. Cek apakah user upload foto baru?
        if ($request->hasFile('image')) {
            
            // Hapus foto lama dulu (biar server bersih)
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Upload foto baru
            $imagePath = $request->file('image')->store('products', 'public');
            
            // Update path foto di database
            $product->image = $imagePath;
        }

        // 3. Update data sisanya
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            // 'image' tidak ditaruh di sini, karena sudah dihandle di atas (pakai $product->image = ...)
        ]);
        
        // Simpan perubahan foto (jika ada)
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Hapus foto dari folder 'storage/app/public/products'
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Hapus data dari database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

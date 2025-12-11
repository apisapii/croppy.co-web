@extends('layouts.admin.app')
@section('content')
@include('layouts.admin.header')
<div class="container-fluid">
    <div class="card shadow col-md-8">
        <div class="card-header">
            <h5>Tambah Produk Baru</h5>
        </div>
        <div class="card-body">
            
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Kucing Oren" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" class="form-control" placeholder="15000" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stock" class="form-control" placeholder="10" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Foto Produk</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                            <small class="text-muted">Format: jpg, png, jpeg. Max: 2MB</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" rows="5" class="form-control" placeholder="Jelaskan detail produk..."></textarea>
                        </div>
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
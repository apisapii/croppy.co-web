@extends('layouts.admin.app')
@section('content')
@include('layouts.admin.header')
<div class="container-fluid">
    <div class="card shadow col-md-6">
        <div class="card-header">
            <h5>Tambah Kategori Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf 
                
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Boneka Rajut" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
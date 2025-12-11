@extends('layouts.admin.app')
@section('content')
@include('layouts.admin.header')
<div class="container-fluid">
    <div class="card shadow col-md-6">
        <div class="card-header">
            <h5>Edit Kategori</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf 
                @method('PUT') <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
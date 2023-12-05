@extends('products.layouts.master')
@section('title', 'Ubah Data Produk')
@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @method('PUT')
        @csrf <!-- CSRF token is required in Laravel forms for security -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
            id="name" name="name" value="{{ old('name', $product->name) }}" >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" 
            id="stock" name="stock" value="{{ old('stock',$product->stock) }}">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" 
            id="price" name="price" value="{{ old('price',$product->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" 
            name="description">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Ubah Data</button>
    </form>
@endsection
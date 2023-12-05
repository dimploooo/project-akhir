@extends('products.layouts.master')
@section('title', 'List Produk')
@section('content')
    <div class="mb-3">
        <a class="btn btn-success px-5" href="{{route('products.create')}}" role="button">Tambah Data Produk +</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Stock</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskirpsi</th>
                <th scope="col">Terakhir Diperbarui</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $products as $product )
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->stock}}</td>
                    <td>@currency($product->price)</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                        <form action="/products/{{$product->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm btn-icon" href="{{route('products.edit', $product->id)}}" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="btn btn-danger btn-sm btn-icon confirm-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
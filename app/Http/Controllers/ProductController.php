<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        Product::create($validatedData);
        // toastr()->success('Produk Berhasil Ditambahkan!');
        return redirect()->route('products.index')->with('success', 'Product Berhasil Ditambahkan');
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
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        // toastr()->success('Produk Berhasil Dihapus!');
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

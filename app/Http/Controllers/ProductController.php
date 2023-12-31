<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = new Product;
        $category = 0;
        if(request('category')) {
            $category = request('category');
        }

        return view('home', [
            'title' => 'Home',
            'products' => $products->filter(request(['search', 'category']))->get(),
            'recommendation' => $products->all(),
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $seenProduct = $product;
        $products = Product::all(); 
        return view('product', [
            "title" => "Product Details",
            "seenProduct" => $seenProduct,
            "products" => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

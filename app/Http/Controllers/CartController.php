<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->product->price * $cart->quantity;
        }
        return view('cart', [
            'title' => 'Cart',
            'carts' => $carts,
            'totalPrice' => $totalPrice,
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
        $product = Product::find(session('product')['id']);
        $validatedData = $request->validate([
            'quantity' => "required|numeric|min:1|max:$product->stock"
        ]);

        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->exists()) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
            $cart->quantity = $request->quantity;
            $cart->update();

            return redirect('/cart')->with('alert', ['type' => 'success', 'msg' => 'Product Quantity Has Been Updated in Cart']);
        } else {
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['product_id'] = $product->id;

            Cart::create($validatedData);

            return redirect('/cart')->with('alert', ['type' => 'success', 'msg' => 'Product Has Been Added To Cart']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->quantity = $request->quantity;
        $cart->update();

        return redirect('/cart')->with('alert', ['type' => 'success', 'msg' => 'Product Quantity Has Been Updated in Cart']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect('/cart')->with('alert', ['type' => 'success', 'msg' => 'Product Has Been Removed From Cart']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function address(Request $request)
    {
        $input = $request->input();
        $product = Product::find(session('product')['id']);
        $quantity = $input['quantity'];
        if ($product->stock <= $quantity) {
            session()->flash('alert', ['type' => 'danger', 'msg' => 'Quantity must be less or equal to ' . $product->stock]);
        } else {
            session(['product' => ['id' => $product->id, 'quantity' => $quantity ]]);
            return view('address', [
                'title' => 'Checkout | Address',
                'product' => $product
            ]);
        }
    }

    public function payment(Request $request)
    {
        session(['address' => $request->input()]);
        $product = Product::find(session('product')['id']);
        return view('payment', [
            'title' => 'Checkout | Credit Card',
            'product' => $product
        ]);
    }

    public function checkout(Request $request)
    {
        session(['creditCard' => $request->input()]);
        try {
            Product::decreaseStock(session('product'));
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('alert', ['type' => 'success', 'msg' => 'Product was Successfully Purchased']);
        } catch (Exception $e) {
            return redirect('/')->with('alert', ['type' => 'danger', 'msg' => 'Failed to Purchase Product']);
        } 
    }
}

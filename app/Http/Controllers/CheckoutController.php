<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function storeQuantity(Request $request)
    {
        $product = Product::find(session('product')['id']);
        $validatedData = $request->validate([
            'quantity' => "required|numeric|min:1|max:$product->stock"
        ]);
        session(['product' => ['id' => $product->id, 'quantity' => $validatedData['quantity']]]);
        return redirect('/address');
    }

    public function showAddressForm()
    {
        $product = Product::find(session('product')['id']);
        $data = [
            'title' => 'Checkout | Address',
            'product' => $product
        ];
        if (Address::where('user_id', auth()->user()->id)->exists())
        {
            $data['address'] = Address::where('user_id', auth()->user()->id);
        }
        return view('address', $data);
    }

    public function storeAddress(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        if ($request->saveInformation) {
            $validatedData['user_id'] = auth()->user()->id;
            Address::create($validatedData);
        }
        session(['address' => $validatedData]);
        return redirect('/payment');
    }

    public function showPaymentForm()
    {
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

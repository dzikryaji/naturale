<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Card;
use App\Models\Product;
use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function showAddressForm()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->product->price * $cart->quantity;
        }
        $data = [
            'title' => 'Checkout | Address',
            'carts' => $carts,
            'totalPrice' => $totalPrice
        ];
        if (Address::where('user_id', auth()->user()->id)->exists()) {
            $data['address'] = Address::where('user_id', auth()->user()->id)->first();
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
            if (Address::where('user_id', auth()->user()->id)->exists()) {
                Address::where('user_id', auth()->user()->id)->update($validatedData);
            } else {
                $validatedData['user_id'] = auth()->user()->id;
                Address::create($validatedData);
            }
        }
        session(['address' => $validatedData]);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm()
    {
        if (session()->has('address')) {
            $carts = Cart::where('user_id', auth()->user()->id)->get();
            $totalPrice = 0;
            foreach ($carts as $cart) {
                $totalPrice += $cart->product->price * $cart->quantity;
            }
            $data = [
                'title' => 'Checkout | Payment Information',
                'carts' => $carts,
                'totalPrice' => $totalPrice
            ];
            if (Card::where('user_id', auth()->user()->id)->exists()) {
                $data['card'] = Card::where('user_id', auth()->user()->id)->first();
            }
            return view('payment', $data);
        } else {
            return redirect('/cart');
        }
    }

    public function checkout(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|integer|digits_between:13,19',
            'month' => 'required|integer|digits_between:1,2',
            'year' => 'required|integer|digits:4',
            'cvc' => 'required|integer|digits:3'
        ]);

        if ($request->saveInformation) {
            if (Card::where('user_id', auth()->user()->id)->exists()) {
                Card::where('user_id', auth()->user()->id)->update($validatedData);
            } else {
                $validatedData['user_id'] = auth()->user()->id;
                Card::create($validatedData);
            }
        }

        session(['creditCard' => $request->input()]);
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        try {
            foreach ($carts as $cart) {
                Product::decreaseStock($cart);
                $cart->delete();
            }
            return redirect('/')->with('alert', ['type' => 'success', 'msg' => 'Product was Successfully Purchased']);
        } catch (Exception $e) {
            return redirect('/')->with('alert', ['type' => 'danger', 'msg' => 'Failed to Purchase Product']);
        }
    }
}

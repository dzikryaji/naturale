<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Card;
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
            }else {
                $validatedData['user_id'] = auth()->user()->id;
                Address::create($validatedData);
            }
        }
        session(['address' => $validatedData]);
        return redirect('/payment');
    }

    public function showPaymentForm()
    {
        $product = Product::find(session('product')['id']);
        $data = [
            'title' => 'Checkout | Credit Card',
            'product' => $product
        ];
        if (Card::where('user_id', auth()->user()->id)->exists()) {
            $data['card'] = Card::where('user_id', auth()->user()->id)->first();
        }
        return view('payment', $data);
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
            }else {
                $validatedData['user_id'] = auth()->user()->id;
                Card::create($validatedData);
            }
        }

        session(['creditCard' => $request->input()]);
        try {
            Product::decreaseStock(session('product'));
            $request->flush();
            return redirect('/')->with('alert', ['type' => 'success', 'msg' => 'Product was Successfully Purchased']);
        } catch (Exception $e) {
            return redirect('/')->with('alert', ['type' => 'danger', 'msg' => 'Failed to Purchase Product']);
        }
    }
}

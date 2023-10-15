<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $data = [
            'title' => 'Profile',
            'user' => $user
        ];
        if (Address::where('user_id', auth()->user()->id)->exists()) {
            $data['address'] = Address::where('user_id', auth()->user()->id)->first();
        }
        return view('profile', $data);
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $rules = [
            "name" => "required|max:255",
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ];

        if ($request->email != $user->email) {
            $rules['email'] = "required|email:dns|unique:users";
        }

        if (Address::where('user_id', auth()->user()->id)->exists() || $request->has('address') || $request->has('city') || $request->has('provinve') || $request->has('contact_number')) {
            $rules['address'] = 'required|max:255';
            $rules['city'] = 'required|max:255';
            $rules['province'] = 'required|max:255';
            $rules['contact_number'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10';
        }

        $validatedData = $request->validate($rules);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'] ?? $request['email'];
        $user->update();

        if (Address::where('user_id', auth()->user()->id)->exists()) {
            unset($validatedData['email']);
            Address::where('user_id', auth()->user()->id)->update($validatedData);
        } else if ($request->has('address')) {
            unset($validatedData['email']);
            Address::create($validatedData);
        }

        return redirect('/')->with('alert', ['type' => 'success', 'msg' => 'Profile Has Been Updated']);
    }
}

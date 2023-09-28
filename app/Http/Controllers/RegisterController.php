<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:8|max:255"
        ]);

        User::create($validatedData);

        return redirect('/login')->with('alert', ['type' => 'success', 'msg' => 'Your account has been created successfully']);
    }
}

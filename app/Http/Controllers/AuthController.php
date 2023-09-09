<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // User registration
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'gender' => 'required',
            'dateOfBirth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'bloodType' => 'required',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

        return response()->json(['message' => 'User registered successfully', 'user' => $user]);
    }


    // User login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, return a success response or generate a token
            return response()->json(['message' => 'Login successful', 'token' => 'YOUR_TOKEN_HERE']);
        } else {
            // Authentication failed, return an error response
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}

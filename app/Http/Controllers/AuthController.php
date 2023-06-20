<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token'=>$token], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('emali', 'password');

        if (Auth::attemp($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTexttoken;
            return response()->json(['token'=>$token], 200);
        }
        
        return response()->json(['error' => 'Unauthorized'],401);
    }
}
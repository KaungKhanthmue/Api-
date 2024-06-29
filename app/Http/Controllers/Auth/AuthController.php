<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
        
            $user = Auth::user();
            
            $token =  $user->createToken('auth')->plainTextToken;
            return response()->json([
                'data' => [
                'user' => $user,
                'token' => $token,]
            ]);
        }
    }
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'data' => [
            'user' => $user,
            'token' => $token,]
        ]);
        }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function register(Request $request) {
        $user = User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin'
        ]);

        return response()->json(['message'=>'user has been created'],200);
    }

    public function login(Request $request) {
        $credentials = $request->only('email','password');

        if(!Auth::attempt($credentials))
            return response()->json(['message'=>'not Auth'],401);
        
        return response()->json(['user' => Auth::user()]);
        
    }

    public function logout() {
        return Auth::logout();
    }
}

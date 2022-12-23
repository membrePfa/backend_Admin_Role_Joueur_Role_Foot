<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class JoeurController extends Controller
{
    public function register(Request $request) {
        // $fields = $request->validate([
          //   'name' => 'required|string',
            // 'email' => 'required|string|unique:users,email',
             //'password' => 'required|string|confirmed'
         //]);
 
         $user = User::create([
             'name' =>$request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
             'role' => 'joueur',
             
         ]);
 
         $token = $user->createToken('myapptoken')->plainTextToken;
 
         $response = [
             'user' => $user,
             'token' => $token
         ];
 
         return response($response, 201);
     }
 
   
}

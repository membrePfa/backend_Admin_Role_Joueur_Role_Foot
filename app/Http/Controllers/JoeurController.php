<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class JoeurController extends Controller
{
    public function register(Request $request) {
       
         $user = User::create([
             'name' =>$request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
             'role' => 'joueur',
             
         ]);
 
         return response()->json(['message'=>'user has been created'],200);
     }
 
   
}

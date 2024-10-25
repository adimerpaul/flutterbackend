<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    function login(Request $request){
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if(!$user || !password_verify($credentials['password'], $user->password)){
            return response()->json([
                'message' => 'No autorizado'
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);

    }
}

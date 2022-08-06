<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();


        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'error' => 'Identifiants invalides'
            ], 401);
        }

        $token = $user->createToken('bgm-api')->plainTextToken;
        // dd($user);
        $response = [
            'token' => $token,
            'user' => $user,
        ];

        if(Auth::attempt($fields)){

            return response($response, 200);
        }

        return response([
            'errors' => 'Identifiants invalides'
        ], 401);
    }
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),

        ]);

        $response = [
            'user' => $user,
        ];

        return response($response, 201);
    }

}

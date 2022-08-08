<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'pseudo' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('pseudo', $data['pseudo'])->first();


        // Check password
        if(!$user || !Hash::check($data['password'], $user->password)) {
            echo ("ok");
            return response([
                'error' => 'Identifiants invalides'
            ], 401);
        } 
        
        if(Auth::attempt(["pseudo" => $data["pseudo"], "password" => $data["password"]])){
            $token = $user->createToken('bgm-api')->plainTextToken;
            $response = [
                'token' => $token,
                'user' => $user,
            ];

            return response($response, 200);
        }

        return response([
            'errors' => 'Identifiants invalides'
        ], 401);
    }

    public function register(Request $request){
        $data = $request->validate([
            'pseudo' => 'required|string',
            // 'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $data["password"] = Hash::make($data["password"]);

        $user = User::create($data);

        return response()->json($user, 201);
    }

}

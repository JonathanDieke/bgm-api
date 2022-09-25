<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            return response([
                'message' => 'Identifiants invalides'
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
            'message' => 'Identifiants invalides'
        ], 401);
    }

    public function register(Request $request){
        $data = $request->validate([
            'pseudo' => 'required|string|unique:users,pseudo',
            'password' => 'required|string|min:3',
        ]);

        $data["password"] = Hash::make($data["password"]);

        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function update(UserProfileRequest $request){
        $data = $request->validated();

        $profile = $request->user()->profile ;

        Log::channel('daily')->debug($data);

        if($profile){
            $profile->update($data);
        }else{
            $data['user_id'] = Auth::id();
            $profile = UserProfile::create($data);
            $profile->user()->associate($request->user());
            $profile->save();
        }

        return response()->json(["message" => "Mise à jour réussie !", "data" => $profile], status:200);
    }
}

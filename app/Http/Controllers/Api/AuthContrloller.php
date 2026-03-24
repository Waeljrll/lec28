<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthContrloller extends Controller
{
    use ApiResponseTrait;
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        $user = User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([
                "email"=>["credentials are incorrect"],
                "password"=>["credentials are incorrect"]
            ]);}
        $token=$user->createToken("331_token")->plainTextToken;

        return $this->success(['token'=>$token]);



    }
    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return $this->success();



    }
}

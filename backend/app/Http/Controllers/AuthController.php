<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repository\Authentication\IAuthenticationRepo;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private IAuthenticationRepo $authenticationRepo;

    function __construct(IAuthenticationRepo $authenticationRepo){
        $this->authenticationRepo = $authenticationRepo;
    }

    function login(LoginRequest $loginRequest){
        $token = $this->authenticationRepo->authentecate($loginRequest);
        return response()->json([
            'name' => $token->accessToken->tokenable->name,
            'access_token' => $token->plainTextToken,
            'expires_at' => $token->accessToken->expires_at
        ],200);
    }

    function logout(){
        $this->authenticationRepo->logout();
        return response()->json(null,200);
    }
}

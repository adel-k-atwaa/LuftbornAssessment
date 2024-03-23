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
            'access_token' => $token
        ],200);
    }

    function logout(){

    }
}

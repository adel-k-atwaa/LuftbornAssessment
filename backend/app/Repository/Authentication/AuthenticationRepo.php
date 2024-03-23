<?php
namespace App\Repository\Authentication;

use App\Exceptions\UnauthorizedHttpException;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationRepo implements IAuthenticationRepo{
    function authentecate(LoginRequest $request){
        $user = User::findByEmail($request->email)->get()->first();
        // $user = $user?$user->makeVisible(["password"]):$user;
        if(!$user || !Hash::check($request->password,$user->password)){
            throw new UnauthorizedHttpException("Invalid username or password");
        }
        return $user->createToken($user->name.'-AuthToken');
    }

    function logout(){
        auth()->user()->tokens()->delete();
    }
}

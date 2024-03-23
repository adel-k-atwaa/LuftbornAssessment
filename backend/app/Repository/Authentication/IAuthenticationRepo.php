<?php
namespace App\Repository\Authentication;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;

interface IAuthenticationRepo{

    function authentecate(LoginRequest $Request);

    function logout();
}

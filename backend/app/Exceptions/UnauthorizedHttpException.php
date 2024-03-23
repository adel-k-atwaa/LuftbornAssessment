<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UnauthorizedHttpException extends HttpException
{
    function __construct(string $message){
        parent::__construct(401,$message);
    }
}

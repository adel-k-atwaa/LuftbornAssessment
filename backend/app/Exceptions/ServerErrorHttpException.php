<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ServerErrorHttpException extends HttpException
{
    function __construct(string $message,?Throwable $previous=null,array $headers= [],int $code = 0){
        parent::__construct(500,$message,$previous,$headers,$code);
    }
}

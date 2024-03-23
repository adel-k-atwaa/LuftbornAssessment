<?php
namespace App\Factories;

use App\Exceptions\ServerErrorHttpException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ExceptionFactory{

    public static function create(Throwable $e):HttpException{
        if($e instanceof ModelNotFoundException){
            return new NotFoundHttpException($e->getMessage(),$e->getPrevious(),$e->getCode());
        }else if ($e instanceof ValidationException){
            return new BadRequestHttpException($e->getMessage());
        }else{
            return new ServerErrorHttpException($e->getMessage(),$e->getPrevious(),[],$e->getCode());
        }
    }
}

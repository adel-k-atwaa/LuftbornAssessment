<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function ($router){
    // $router->resource('/task',TaskController::class);
    $router->post('/task',[TaskController::class,"store"]);
    $router->get('/task',[TaskController::class,"index"]);
    $router->get('/task/{id}',[TaskController::class,"show"]);
    $router->put('/task/{id}',[TaskController::class,"update"]);
    $router->delete('/task/{id}',[TaskController::class,"destroy"]);


    $router->get('/logout',[AuthController::class,'logout']);
});
Route::post('login',[AuthController::class,'login']);

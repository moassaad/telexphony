<?php

use App\Http\Controllers\API\Application\Authentication\LoginController;
use App\Http\Controllers\API\Application\Authentication\LogoutController;
use App\Http\Controllers\API\Application\Authentication\RegisterController;
use Illuminate\Support\Facades\Route;


Route::controller(LoginController::class)->middleware('guest.api:sanctum')->group(function (){
    Route::post('/login', 'login');
});
Route::controller(RegisterController::class)->middleware('guest.api:sanctum')->group(function () {
    Route::post('/register', 'register');
});
Route::middleware('auth:sanctum')->group(function (){
    Route::controller(LogoutController::class)->group(function () 
    {
        Route::post('logout','logout');
    });
});

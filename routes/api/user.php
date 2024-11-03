<?php

use App\Http\Controllers\API\Application\Authentication\ChangePasswordController;
use App\Http\Controllers\API\Application\User\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function (){
    Route::post('profile',[UserController::class, 'profile']);
});
Route::controller(UserController::class)
    ->prefix('profile')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/', 'profile');
        Route::put('/edit/info', 'updateUserInformation');
        Route::put('/edit/account_contact', 'updateAccountContact');
        Route::put('/edit/address', 'updateAddress');
        Route::put('/edit/change_password', [ChangePasswordController::class, 'changePassword']);
    }
);
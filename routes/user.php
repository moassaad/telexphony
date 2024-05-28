<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;



// Route::controller(UserController::class)->middleware(['auth'])->group(function () {
//     Route::get('/profile', 'profile')->name('user.profile');
//     Route::get('/profile/edit', 'edit')->name('user.profile.edit');
//     Route::put('/profile/edit', 'update')->name('user.profile.edit.post');
// });
Route::controller(ProfileController::class)
    ->prefix('profile')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'profile')->name('user.profile');
        Route::get('/edit', 'edit')->name('user.profile.edit.info');
        Route::put('/edit/info', 'updateUserInformation')->name('user.profile.edit.info');
        Route::put('/edit/address', 'updateAddress')->name('user.profile.edit.address');
        Route::put('/edit/account_contact', 'updateAccountContact')->name('user.profile.edit.account_contact');
        Route::put('/edit/change_password', [ChangePasswordController::class, 'changePassword'])->name('user.profile.edit.change_password');
    }
);

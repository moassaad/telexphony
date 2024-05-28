<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralPagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/users', 'App\Http\Controllers\UserController@index');

# Language Options
Route::get('/changeLang/{lang}', function ($lang) {
    if(in_array($lang, config('app.available_locales')))
    {
        session()->put('localLang',$lang);
    }
    return redirect()->back();
})->name('changeLang');

Route::controller(GeneralPagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/home', 'home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact-us', 'contact_us')->name('contact-us');
    Route::get('/help', 'help')->name('help');
    Route::get('/login', [LoginController::class,'show'])->name('login');
    Route::get('/register', [RegisterController::class,'show'])->name('register');
    Route::get('/test', 'test');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
});
Route::controller(RegisterController::class)->group(function () {
    Route::post('/register', 'register');
});
// Route::get('/logout', 'App\Http\Controllers\Auth\LogoutController@logout')->middleware(['auth']);
Route::controller(LogoutController::class)->middleware(['auth'])->group(function () {
    Route::get('/logout', 'logout')->name('logout');
});

<?php

use App\Http\Controllers\API\Application\GeneralAPIController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/test', GeneralAPIController::class."@test");

<?php

use App\Http\Controllers\API\Application\Report\ReportController;
use Illuminate\Support\Facades\Route;


Route::controller(ReportController::class)
    ->prefix('/phone/report')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/status-list', 'statusList');
        Route::get('/id/{phoneID}', 'show');
        Route::get('/list/{phoneID}', 'list');
        Route::post('/create/{phoneID}', 'store');
        Route::put('/edit/{report}', 'update');
        Route::delete('/delete/{report}', 'delete');
    }
);
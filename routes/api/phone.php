<?php


use App\Http\Controllers\API\Application\Phone\PhoneController;
use App\Http\Controllers\API\Application\Phone\ReportPhoneController;
use App\Http\Controllers\API\Application\Phone\SearchController;
use Illuminate\Support\Facades\Route;

Route::controller(PhoneController::class)
    ->prefix('/phone')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/id/{PhoneID}', 'show');
        Route::get('/list', 'list');
        Route::post('/create', 'store');
        Route::put('/edit/{phone}', 'update');
        Route::delete('/delete/{phone}', 'delete');
    }
);

Route::controller(SearchController::class)
    ->group(function () {
        Route::post('/search/imei', '_imei');
        Route::get('/search/imei/{imei}', 'result_imei');
});

Route::controller(ReportPhoneController::class)
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::post('/report-phone', 'store_report_phone')->name('report.phone.post');
});

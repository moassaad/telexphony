<?php

use App\Http\Controllers\Phone\PhoneController;
use App\Http\Controllers\Phone\SearchController;
use App\Http\Controllers\Phone\ReportPhoneController;

use Illuminate\Support\Facades\Route;

Route::controller(SearchController::class)->group(function () {
    Route::post('/search/imei', '_imei')->name('phone.search.imei.post');
    Route::get('/search/imei/{imei}', 'result_imei')->name('phone.search.imei.get');
});

Route::controller(ReportPhoneController::class)->middleware(['auth'])->group(function () {
    Route::get('/report-phone', 'report_phone')->name('report.phone.get');
    Route::post('/report-phone', 'store_report_phone')->name('report.phone.post');
});

Route::controller(PhoneController::class)
    ->prefix('/phone')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/list', 'list')->name('phone.list');
        Route::get('/create', 'create')->name('phone.create.get');
        Route::post('/create', 'store')->name('phone.create.post');
        Route::get('/edit/{phoneID}', 'edit')->name('phone.edit.get');
        Route::put('/edit/{phone}', 'update')->name('phone.edit.post');
        Route::delete('/delete/{phone}', 'delete')->name('phone.delete');
    }
);

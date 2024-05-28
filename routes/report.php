<?php

use App\Http\Controllers\Report\ReportController;
// use App\Http\Controllers\Auth\SearchController;

use Illuminate\Support\Facades\Route;

Route::controller(ReportController::class)
    ->prefix('/phone/report')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/list/{phoneID}', 'list')->name('phone.report.list');
        Route::get('/create/{phoneID}', 'create')->name('phone.report.create.get');
        Route::post('/create/{phoneID}', 'store')->name('phone.report.create.post');
        Route::get('/edit/{reportID}', 'edit')->name('phone.report.edit.get');
        Route::put('/edit/{report}', 'update')->name('phone.report.edit.post');
        Route::delete('/delete/{report}', 'delete')->name('phone.report.delete');
    }
);

<?php

use Illuminate\Support\Facades\Route;
use Logistic\Modules\Domain\Driver\src\Http\Controllers\DriverController;

Route::controller(DriverController::class)->group(function () {
    Route::get('drivers', 'index');
    Route::post('drivers', 'store');
    Route::get('drivers/{id}', 'show');
});

no im<?php

use Illuminate\Support\Facades\Route;
use Logistic\Modules\Domain\Vehicle\src\Http\Controllers\VehicleController;

Route::controller(VehicleController::class)->group(function () {
    Route::get('vehicles', 'index');
    Route::post('vehicles', 'store');
    Route::get('vehicles/{id}', 'show');
});


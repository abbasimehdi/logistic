<?php

use Illuminate\Support\Facades\Route;
use Logistic\Modules\Domain\Assignment\src\Http\Controllers\AssignmentController;

Route::prefix('assignments')->group(function () {
    Route::controller(AssignmentController::class)->group(function () {
        Route::post('assign', 'assign');
        Route::get('vehicles', 'vehiclesWithDriver');
    });
});

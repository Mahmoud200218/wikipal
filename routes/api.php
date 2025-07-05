<?php

use App\Http\Controllers\Api\Dashboard\OpinionController;
use Illuminate\Support\Facades\Route;

// Front Api routes

// Dashboard Api routes
Route::group([
    'prefix' => 'dashboard/',
    'as' => 'dashboard.',
], function () {
    Route::apiResource('opinions', OpinionController::class);
});

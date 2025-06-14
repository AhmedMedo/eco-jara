<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::apiResource('projects', ProjectController::class);
});
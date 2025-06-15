<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\BuyerDashboardController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // Seller API routes
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::apiResource('projects', ProjectController::class);

    // Buyer API routes
    Route::prefix('buyer')->group(function () {
        Route::get('/dashboard', [BuyerDashboardController::class, 'index']);
    });
});
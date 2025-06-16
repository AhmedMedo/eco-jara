<?php

use Illuminate\Support\Facades\Route;

// Seller routes
Route::get('/login', function () {
    return view('app');
});

Route::get('/dashboard', function () {
    return view('app');
});

Route::get('/marketplace', function () {
    return view('app');
});

Route::get('/certificates', function () {
    return view('app');
});

Route::get('/reports', function () {
    return view('app');
});

Route::get('/settings', function () {
    return view('app');
});

// Buyer routes
Route::prefix('buyer')->group(function () {
    Route::get('/login', function () {
        return view('buyer');
    });

    Route::get('/register', function () {
        return view('buyer');
    });

    Route::get('/account-review', function () {
        return view('buyer');
    });

    Route::get('/dashboard', function () {
        return view('buyer');
    });

    Route::get('/marketplace', function () {
        return view('buyer');
    });

    Route::get('/certificates', function () {
        return view('buyer');
    });

    Route::get('/reports', function () {
        return view('buyer');
    });

    Route::get('/settings', function () {
        return view('buyer');
    });
});

// Fallback route for seller (existing functionality)
Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!buyer).*');
<?php

declare(strict_types=1);

use App\Http\Controllers\BetController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;

Route::middleware([])->group(function () {
    Route::controller(LandingController::class)->group(function () {
        Route::name('base.')->group(function () {
            Route::get('/', 'index')->name('landing');
            Route::get('/search', 'search')->name('search');
        });
    });

    Route::controller(LotController::class)->group(function () {
        Route::name('lot.')->group(function () {
            Route::get('/lots', 'index')->name('index');
        });
    });
});

Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::controller(LotController::class)->group(function () {
        Route::name('lot.')->group(function () {
            Route::get('/lot/{lot}', 'view')->name('view');
            Route::get('/add-lot', 'create')->name('create');
            Route::post('/add-lot', 'store')->name('store');
        });
    });

    Route::controller(BetController::class)->group(function () {
        Route::name('bet.')->group(function () {
            Route::get('/bets', 'index')->name('index');
            Route::post('/bets', 'store')->name('store');
        });
    });
});

require_once __DIR__ . '/auth.php';

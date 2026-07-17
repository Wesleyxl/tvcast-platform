<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MovieCategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    // Rate limiting mais restrito para evitar brute-force
    Route::middleware('throttle:10,1')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::middleware('auth:api')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::middleware('auth:api')->group(function () {
    Route::get('categories', [MovieCategoryController::class, 'index']);
    Route::get('categories/{categoryId}/movies', [MovieController::class, 'index'])
        ->whereNumber('categoryId');
    Route::get('movies/{streamId}/info', [MovieController::class, 'info'])
        ->whereNumber('streamId');
});

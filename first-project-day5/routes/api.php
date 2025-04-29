<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/posts', [ProfileController::class, 'index'])->name('profile.edit');

    // Route::get('/posts', [PostController::class, 'index']);
    // Route::get('/posts/{id}', [PostController::class, 'show']);
    // Route::post('/posts', [PostController::class, 'store']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/posts', [PostController::class, 'index']);
        Route::get('/posts/{id}', [PostController::class, 'show']);
        Route::post('/posts', [PostController::class, 'store']);
    });
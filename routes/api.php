<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware(['apiLocalization', 'auth.apikey'])->group(function () {
    Route::post("login", "App\Http\Controllers\AuthController@login");

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('account', App\Http\Controllers\AccountController::class);

        Route::apiResource('contact', App\Http\Controllers\ContactController::class);

        Route::apiResource('todo', App\Http\Controllers\TodoController::class);

        Route::apiResource('key', App\Http\Controllers\KeyController::class);

        Route::apiResource('visa', App\Http\Controllers\VisaController::class);

        Route::apiResource('category', App\Http\Controllers\CategoryController::class);
    });
});

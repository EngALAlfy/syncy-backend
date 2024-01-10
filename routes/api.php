<?php

use Illuminate\Http\Request;
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

Route::get("login/phone/request-otp/{countryCode}/{phone}" , "App\Http\Controllers\AuthController@apiLoginRequestOTP");
Route::get("login/phone/verify-otp/{countryCode}/{phone}" , "App\Http\Controllers\AuthController@apiLoginVerifyOTP");

Route::middleware(['auth:sanctum' , 'apiLocalization'])->group(function () {
});


Route::apiResource('aaccount', App\Http\Controllers\AaccountController::class);

Route::apiResource('contact', App\Http\Controllers\ContactController::class);

Route::apiResource('todo', App\Http\Controllers\TodoController::class);

Route::apiResource('key', App\Http\Controllers\KeyController::class);

Route::apiResource('visa', App\Http\Controllers\VisaController::class);

Route::apiResource('category', App\Http\Controllers\CategoryController::class);

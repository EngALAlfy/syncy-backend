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

Route::middleware('auth:sanctum')->group(function () {
    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    });
});

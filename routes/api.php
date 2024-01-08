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
    Route::get("profile" , "App\Http\Controllers\UserController@apiProfile");
    Route::post("profile/update" , "App\Http\Controllers\UserController@apiUpdateProfile");
    Route::post("profile/update-photo" , "App\Http\Controllers\UserController@apiUpdateProfilePhoto");
    Route::delete("profile/delete" , "App\Http\Controllers\UserController@apiDeleteAccount");

    Route::get("posts/favorites" , "App\Http\Controllers\PostController@apiFavorites");
    Route::get("posts/favorites/{post}/add" , "App\Http\Controllers\PostController@apiFavoritesAdd");
    Route::get("posts/favorites/{post}/remove" , "App\Http\Controllers\PostController@apiFavoritesRemove");
    Route::get("posts/owned" , "App\Http\Controllers\PostController@apiOwned");
    Route::post("posts/owned/{post}/update" , "App\Http\Controllers\PostController@apiOwnedUpdate");
    Route::delete("posts/owned/{post}/delete" , "App\Http\Controllers\PostController@apiOwnedDelete");
    Route::post("posts/owned/{post}/featured/start" , "App\Http\Controllers\PostController@apiOwnedFeaturedStart");
    Route::post("posts/owned/{post}/featured/stop" , "App\Http\Controllers\PostController@apiOwnedFeaturedStop");
});

Route::get("categories" , "App\Http\Controllers\CategoryController@apiIndex");

Route::get("countries" , "App\Http\Controllers\CountryController@apiIndex");
Route::get("countries/{country}" , "App\Http\Controllers\CountryController@apiShow");
Route::get("countries/{country}/states" , "App\Http\Controllers\StateController@apiIndex");

/*
 * Posts API
 * @params
 * category_id
 * country_id
 * state_id
 * user_id
 *
 */
Route::get("posts" , "App\Http\Controllers\PostController@apiIndex");
Route::get("posts/sliders" , "App\Http\Controllers\PostController@apiSliders");
Route::get("posts/{post}" , "App\Http\Controllers\PostController@apiShow");

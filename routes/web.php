<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware("guest")->group(function () {
    Route::view("/login", "admin.auth.login");
    Route::post("/login", "App\Http\Controllers\AuthController@login")->name("login");
});

Route::middleware("auth")->group(function () {
    Route::get("/logout", "App\Http\Controllers\AuthController@logout")->name("logout");
});


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
###########################################################################
### Admin Routes
###########################################################################
    Route::prefix("/admin")->as("admin.")->group(function () {
        Route::middleware(["auth"])->group(function () {
            Route::redirect("/", "/admin/home");
            Route::get("/home", "App\Http\Controllers\HomeController@index")->name("home");

            Route::resource("categories", "App\Http\Controllers\CategoryController")->except("show");
            Route::resource("countries", "App\Http\Controllers\CountryController")->except("show");
            Route::resource("states", "App\Http\Controllers\StateController")->except("show");
            Route::resource("posts", "App\Http\Controllers\PostController");
            Route::resource("point-transactions", "App\Http\Controllers\PointTransactionController")->except(["update" , "edit" , "show"]);
            Route::resource("pay-transactions", "App\Http\Controllers\PayTransactionController")->except(["update" , "edit" , "show"]);
            Route::resource("users", "App\Http\Controllers\UserController");

            Route::get("/profile", "App\Http\Controllers\UserController@profile")->name("profile.index");
            Route::get("/profile/edit", "App\Http\Controllers\UserController@editProfile")->name("profile.edit");

            Route::get("/settings", "App\Http\Controllers\SettingsController@index")->name("settings.index");
            Route::get("/settings/clear-cache", "App\Http\Controllers\SettingsController@clearCache")->name("settings.clear-cache");

            Route::get("/settings/activity-log", "App\Http\Controllers\ActivityLogController@index")->name("settings.activity-log");
            Route::get("/settings/activity-log/clear-all", "App\Http\Controllers\ActivityLogController@clearAll")->name("settings.activity-log.clear-all");
            Route::get("/settings/activity-log/{log}", "App\Http\Controllers\ActivityLogController@show")->name("settings.activity-log.show");

            Route::get("/settings/backup", "App\Http\Controllers\BackupController@index")->name("settings.backup");
            Route::get('/settings/backup/restore/{name}', "App\Http\Controllers\BackupController@restore")->name('settings.backup-restore');
            Route::get('/settings/backup/create', "App\Http\Controllers\BackupController@create")->name('settings.backup-create');
            Route::get('/settings/backup/{name}', "App\Http\Controllers\BackupController@show")->name('settings.backup-show');
            Route::delete('/settings/backup/{name}', "App\Http\Controllers\BackupController@destroy")->name('settings.backup-destroy');
        });
    });
});

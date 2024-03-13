<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", function() {
    return redirect()->route("landing.home");
});

Route::prefix("landing-page")->name("landing.")->group(function() {
    Route::controller(LandingPageController::class)->group(function() {
        Route::get("home", "homeView")->name("home");
        Route::get("about-us", "aboutusView")->name("aboutus");
        Route::get("services", "servicesView")->name("services");
        Route::get("blog", "blogView")->name("blog");
    });
});

Route::prefix("auth")->name("auth.")->group(function() {
    Route::controller(AuthController::class)->group(function() {
        Route::get("login", "viewLogin")->name("login");
        Route::post("login", "login")->name("login.post");

        Route::get("register", "viewRegister")->name("register");
        Route::post("register", "register")->name("register.post");
    });
});

Route::group(["middleware" => "auth"], function() {
    Route::prefix("account")->name("account.")->group(function() {
        Route::controller(DashboardController::class)->group(function() {
            Route::get("/", "mainPageView")->name("main-page");
            Route::get("/logout", "logout")->name("logout");
        });
    });

});

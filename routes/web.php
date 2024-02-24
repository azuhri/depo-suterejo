<?php

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
    return "hello world";
});

Route::get("/hello", function() {
    return view("hellow");
});

Route::get("pertambahan", function() {
    $number = 10 +10;
    return " 10 + 10 = ".$number;
});

Route::get('/landing-page', function () {
    return view('welcome');
});

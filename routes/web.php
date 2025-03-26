<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Home/Landing/Index Pages
Route::get('/', [HomeController::class, "showHome"])->name("root");
Route::get('/home', [HomeController::class, "handleRedirect"])->name("home");

// Account Pages
Route::get('/account', [AuthenticationController::class, "showLogin"])->name("account.login.show");

Route::get('/account/register', [RegistrationController::class, "showRegister"])->name("account.register.show");
Route::post('/account/register', [RegistrationController::class, "register"])->name("account.register.handle");

Route::get('/account/login', [AuthenticationController::class, "showLogin"])->name("account.login.show");
Route::post('/account/login', [AuthenticationController::class, "login"])->name("account.login.handle");

Route::get('/account/logout', [AuthenticationController::class, "logout"])->name("account.logout");
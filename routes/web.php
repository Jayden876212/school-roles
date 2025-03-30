<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FormActionController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\EnsureUserIsLoggedIn;
use App\Http\Middleware\EnsureUserIsLoggedOut;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

// Home/Landing/Index Pages
Route::get('/', [HomeController::class, "showHome"])->name("home");
Route::get('/home', [HomeController::class, "handleRedirect"])->name("home.handleRedirect");

// Account Pages
Route::middleware([EnsureUserIsLoggedOut::class])->group(function(): void {
    Route::get('/account', [AuthenticationController::class, "handleRedirect"])->name("account.handleRedirect");

    Route::get('/account/register', [RegistrationController::class, "showRegister"])->name("register.show");
    Route::post('/account/register', [RegistrationController::class, "register"])->name("register.handle");

    Route::get('/account/login', [AuthenticationController::class, "showLogin"])->name("login.show");
    Route::post('/account/login', [AuthenticationController::class, "login"])->name("login.handle");
});

Route::get('/account/logout', [AuthenticationController::class, "logout"])->name("logout")->middleware([EnsureUserIsLoggedIn::class]);

// Grades
Route::middleware([EnsureUserIsLoggedIn::class])->group(function(): void {
    Route::get("/grades", [GradesController::class, "showGrades"])->name("grades.show");
});

// Form Action Test Pages
Route::get("/form", [FormActionController::class, "showPage"])->name("form");
Route::post("/form/request1", [FormActionController::class, "handleRequest1"])->name("request1");
Route::post("/form/request2", [FormActionController::class, "handleRequest2"])->name("request2");
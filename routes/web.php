<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

// Auth rotes - disponíveis apenas aos usuários não logados
Route::middleware([CheckIsNotLogged::class])->group(
    function() {
        Route::get("login", [AuthController::class, "login"])->name("login");
        Route::post("loginSubmit", [AuthController::class, "loginSubmit"])->name("form_submit");
});

// App routes - disponíveis apenas aos usuários logados
Route::middleware([CheckIsLogged::class])->group(
    function() {        
        Route::get("/", [MainController::class, "index"])->name("home");
        Route::get("/create", [MainController::class, "create"])->name("novo");
        Route::get("logout", [AuthController::class, "logout"])->name("logout");
});
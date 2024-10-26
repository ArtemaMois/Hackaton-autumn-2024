<?php

use App\Http\Controllers\api\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->middleware('guest')->name('register');
    Route::post('/login', 'login')->middleware('guest')->name('login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum')->name('logout');
});

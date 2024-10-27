<?php

use App\Http\Controllers\api\User\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
->middleware('auth:sanctum')
->prefix('/account')
->group(function () {
    Route::get('/', 'index')->name('account.index');
    Route::patch('/', 'update')->name('account.update');
});

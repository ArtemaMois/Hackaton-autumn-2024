<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
->middleware('auth:sanctum')
->group(function () {
    Route::patch('/account', 'update')->name('account.update');
});

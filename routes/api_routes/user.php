<?php

use App\Http\Controllers\api\User\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
->middleware('auth:sanctum')
->group(function () {
    Route::patch('/account', 'update')->name('account.update');
});

<?php

use App\Http\Controllers\api\Task\TaskController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)
->prefix('/tasks')
->middleware('auth:sanctum')
->group(function () {
    Route::get('/', 'index')->name('tasks.index');
    Route::post('/', 'store')->name('tasks.store');
    Route::get('/{task}', 'show')->name('tasks.show');
    Route::patch('/{task}', 'update')->name('tasks.update');
    Route::delete('/{task}', 'delete')->name('tasks.delete');
});

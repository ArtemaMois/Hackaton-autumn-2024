<?php

use App\Http\Controllers\api\Task\TaskController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)
->prefix('/tasks')
->middleware('auth:sanctum')
->group(function () {
    Route::get('/', 'index')->name('task.manager');
    Route::post('/', 'store')->name('task.store');
    Route::get('/{task}', 'show')->name('tasks.show');
    Route::patch('/{task}', 'update')->name('tasks.update');
    Route::delete('/{task}', 'delete')->name('tasks.delete');
});

<?php

use App\Http\Controllers\api\Excel\ExcelController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Route;

Route::controller(ExcelController::class)
->prefix('/tasks')
// ->middleware('auth:sanctum')
->group(function () {
    Route::get('/export', 'export')->name('excel.export');
});

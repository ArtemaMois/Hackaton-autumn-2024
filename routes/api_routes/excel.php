<?php

use App\Http\Controllers\api\Excel\ExcelController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Route;

Route::controller(ExcelController::class)
->prefix('/tasks')
->group(function () {
    Route::get('/export', 'export')
    ->withoutMiddleware('auth:sanctum')
    ->name('excel.export');
});

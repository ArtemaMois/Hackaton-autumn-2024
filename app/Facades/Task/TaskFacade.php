<?php

namespace App\Facades\Task;

use App\Services\Task\TaskService;
use Illuminate\Support\Facades\Facade;

class TaskFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TaskService::class;
    }
}

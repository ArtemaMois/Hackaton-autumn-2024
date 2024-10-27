<?php

namespace App\Http\Controllers\api\Task;

use App\Facades\Task\TaskFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\Task\StoreTaskRequest;
use App\Http\Requests\api\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = TaskFacade::getSortedTasks();
        return response()->json(['status' => 'success', 'data' => $tasks]);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = TaskFacade::createTask($request->validated());
        return response(null, 201);
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        $task->update($request->validated());
        return response()->json(['status' => 'success', 'data' => ['task' => $task]]);
    }

    public function delete(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}

<?php

namespace App\Services\Task;

use App\Http\Resources\api\Task\TaskResource;
use App\Models\Role;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;
use Vtiful\Kernel\Excel;

class TaskService
{
    public function createTask(array $data): Task
    {
        $data['creator_id'] = Auth::user()->id;
        $data['task_status_id'] = 1;
        $task = Task::query()->create($data);
        return $task;
    }

    public function getSortedTasks(): array
    {
        $taskStatuses = $this->getTasksStatuses();
        $tasks = $this->sortTasks($taskStatuses);
        return $tasks;
    }

    private function getTasksStatuses()
    {
        return TaskStatus::all();
    }

    private function sortTasks($taskStatuses)
    {
        $tasks = [];
        foreach($taskStatuses as $status)
        {
            foreach($status->tasks as $task)
            {
                $tasks[] = (object)[ 'code' => $status->title, 'items' => [array_merge(['task_code' => 'task_' . $task->id], TaskResource::make($task)->resolve())]];
            }
        }
        return $tasks;
    }
}

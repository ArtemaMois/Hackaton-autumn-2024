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
        $taskStatuses = $this->getTaskStatuses();
        $tasks = $this->sortTasksByStatus($taskStatuses);
        return $tasks;
    }

    private function getTaskStatuses()
    {
        return TaskStatus::query()->orderBy('updated_at')->get();

    }

    private function sortTasksByStatus($taskStatuses)
    {
        $tasks = [];
        foreach($taskStatuses as $status)
        {
            $items = [];
            foreach($status->tasks->sortBy('updated_at') as $task)
            {
                $items[] = (object)TaskResource::make($task)->resolve();
            }
            $tasks[] = ['code' => $status->code, 'title' => $status->title, 'items' => $items];
        }
        return $tasks;
    }

}

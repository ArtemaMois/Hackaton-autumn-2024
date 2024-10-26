<?php

namespace App\Services\Task;

use App\Models\Role;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;

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
            $tasks[$status->title] = $status->tasks;
        }
        return $tasks;
    }
}

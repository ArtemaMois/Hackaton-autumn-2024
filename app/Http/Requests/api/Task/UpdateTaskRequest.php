<?php

namespace App\Http\Requests\api\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['string'],
            'body' => ['string'],
            'performer_id' => ['exists:users,id'],
            'task_status_id' => ['exists:task_statuses,id']
        ];
    }
}

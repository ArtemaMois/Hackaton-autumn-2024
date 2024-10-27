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

    public function messages(): array
    {
        return [
            'title.string' => 'Заголовок задачи должен быть строкой',
            'body' => 'Описание должно быть строкой',
            'performer_id.exists' => 'Такого исполнителя не существует',
            'task_status_id.exists' => 'Такого статуса не существует'
        ];
    }
}

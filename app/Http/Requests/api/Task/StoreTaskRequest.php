<?php

namespace App\Http\Requests\api\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'body' => ['string', 'nullable'],
            'performer_id' => ['required', 'exists:users,id']
        ];

    }

    public function messages(): array
    {
        return [
            'title.required' => 'Требуется ввести заголовок задачи',
            'title.string' => 'Заголовок задачи должен быть строкой',
            'body.required' => 'Требуется ввести описание задачи',
            'body.string' => 'Описание задачи должно быть строкой',
            'performer_id.required' => 'Выберите исполнителя задачи',
            'performer_id.exists' => 'Такого исполнителя не существует'
        ];
    }
}

<?php

namespace App\Http\Requests\api\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'performer_id' => ['required', 'exists:users,id']
        ];
    }
}

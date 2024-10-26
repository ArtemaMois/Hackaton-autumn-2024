<?php

namespace App\Http\Requests\api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'login' => ['required', 'exists:users,login'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'login.exists' => 'Аккаунта с таким логином не существует',
            'login.required' => 'Требуется ввести логин',
            'password' => 'Пароль не может быть пустым'
        ];
    }
}

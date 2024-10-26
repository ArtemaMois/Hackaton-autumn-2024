<?php

namespace App\Http\Requests\api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'login' => ['required', 'unique:users,login', 'string', 'max:20', 'min:1'],
            'full_name' => ['required', 'max:50', 'min:3'],
            'password' => ['required', 'max:20'],
            'confirmed_password' => ['required', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Требуется ввести логин',
            'full_name.required' => 'Требуется ввести ФИО',
            'password.required' => 'Введите пароль',
            'confirmed_password.required' => 'Введите подтверждение пароля',
            'confirmed_password.same' => 'Пароли должны совпадать',
            'login.string' => 'Логин должен быть строкой',
            'login.unique' => 'Пользователь с таким логином уже существует',
            'login.max' => 'Логин не может более 20 символов',
            'login.min' => 'Логин не может быть пустым',
            'full_name.max' => 'ФИО не может быть длиннее 50 символов',
            'full_name.min' => 'ФИО должно содержать минимум 3 символа',
            'password.max' => 'Пароль не можеть быть более 20 символов',
        ];

    }

}

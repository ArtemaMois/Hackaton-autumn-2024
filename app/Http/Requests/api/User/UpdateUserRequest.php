<?php

namespace App\Http\Requests\api\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'full_name' => ['string', 'max:50'],
            'about_me' => ['string'],
            'login' => ['string', 'max:20', 'unique:users,login']
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.string' => 'ФИО должно быть строкой',
            'full_name.max' => 'ФИО не может быть более 50 символов',
            'about_me.string' => 'Описание должно быть строкой',
            'login.string' => 'Логин должно быть строкой',
            'login.max' => 'Логин не может быть длиннее 20 символов',
            'login.unique' => 'Пользователь с таким логином уже существует',
        ];
    }
}

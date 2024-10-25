<?php

namespace App\Http\Requests\v1\Auth;

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
}

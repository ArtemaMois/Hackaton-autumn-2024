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
}

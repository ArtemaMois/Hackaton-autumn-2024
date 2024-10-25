<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function registerUser(array $data): User
    {
        $data['password'] = $this->encryptPassword($data['password']);
        $user = User::query()->create($data);
        return $user;
    }

    public function getApiToken(User|Authenticatable $user): string
    {
        return $user->createToken(env('APP_NAME'), ['*'], now()->addHours(12))->plainTextToken;
    }

    private function encryptPassword(string $password): string
    {
        return bcrypt($password);
    }

    public function attempt(array $credentials)
    {
        return Auth::attempt($credentials);
    }
}

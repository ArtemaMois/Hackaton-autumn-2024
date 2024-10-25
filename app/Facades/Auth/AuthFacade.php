<?php

namespace App\Facades\Auth;

use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Facade;

class AuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AuthService::class;
    }
}

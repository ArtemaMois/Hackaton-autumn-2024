<?php

namespace App\Http\Controllers\api\Auth;

use App\Facades\Auth\AuthFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = AuthFacade::registerUser($request->validated());
        $token = AuthFacade::getApiToken($user);
        return response()->json(['status' => 'success', 'data' => ['user' => $user, 'token' => $token]], 201);
    }

    public function login()
    {

    }
}

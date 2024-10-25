<?php

namespace App\Http\Controllers\api\Auth;

use App\Facades\Auth\AuthFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\Auth\LoginRequest;
use App\Http\Requests\v1\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = AuthFacade::registerUser($request->validated());
        $token = AuthFacade::getApiToken($user);
        return response()->json(['status' => 'success', 'data' => ['user' => $user, 'token' => $token]], 201);
    }

    public function login(LoginRequest $request)
    {
        if(AuthFacade::attempt(['login' => $request->input('login'), 'password' => $request->input('password')])){
            $user = Auth::user();
            $token = AuthFacade::getApiToken($user);
            return response()->json(['status' => 'success', 'data' => ['token' => $token]]);
        }
        return response()->json(['status' => 'failed', 'data' => ['message' => 'Неверные данные для входа']], 400);

    }
}

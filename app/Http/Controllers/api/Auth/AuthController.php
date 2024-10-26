<?php

namespace App\Http\Controllers\api\Auth;

use App\Facades\Auth\AuthFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\Auth\LoginRequest;
use App\Http\Requests\api\Auth\RegisterRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = AuthFacade::registerUser($request->validated());
        $token = AuthFacade::getApiToken($user);
        return response()->json(['status' => 'success', 'data' => ['role' => $user->role->title, 'token' => $token]], 201);
    }

    public function login(LoginRequest $request)
    {
        if(AuthFacade::attempt(['login' => $request->input('login'), 'password' => $request->input('password')])){
            $user = Auth::user();
            $token = AuthFacade::getApiToken($user);
            return response()->json(['status' => 'success', 'data' => ['token' => $token, 'role' => $user->role->title]]);
        }
        return response()->json(['status' => 'failed', 'data' => ['message' => 'Неверные данные для входа']], 400);

    }


    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(['status' => 'success']);
    }

}

<?php

namespace App\Http\Controllers\api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\User\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());
        return response(null, 204);
    }
}

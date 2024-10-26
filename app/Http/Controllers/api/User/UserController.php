<?php

namespace App\Http\Controllers\api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\User\UpdateUserRequest;
use App\Http\Resources\api\Task\MinifiedTaskResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return response()->json(['status' => 'success', 'data' => MinifiedTaskResource::collection(User::all())]);
    }
    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());
        return response(null, 204);
    }

    public function tasks()
    {
        dd(Auth::user()->created_tasks);
    }

    public function performed()
    {
        dd(Auth::user()->performing_tasks);
    }
}

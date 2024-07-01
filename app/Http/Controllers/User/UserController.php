<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()->with('images')->paginate(10);
        return UserResource::collection($user);
    }

    public function authUser()
    {
        $user = User::findOrFail(auth()->user()->id);
        return new UserResource($user);
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());
        return new UserResource($user);
    }
}
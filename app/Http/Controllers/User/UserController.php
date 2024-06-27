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
        $user = User::query()->with('images')->get();
        return UserResource::collection($user);
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());
        return new UserResource($user);
    }
}
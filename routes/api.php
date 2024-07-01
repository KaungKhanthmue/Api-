<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\FriendController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

    Route::get('auth-user',[UserController::class,'authUser']);
});
Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::get('friend_add/{yourFriendId}',[FriendController::class,'friend_add']);
Route::get('user-friend/{userId}',[FriendController::class,'user_friend']);

Route::get('user-list',[UserController::class,'index']);

Route::post('user-create',[UserController::class,'create']);

Route::get('post-list',[PostController::class,'index']);
Route::post('post-create',[PostController::class,'create']);
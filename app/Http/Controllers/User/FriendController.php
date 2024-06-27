<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserFriend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friend_add($yourFriendId)
    {
        $user = User::first();

        $user->addFriend($yourFriendId);
        return 'success';
    }
    public function user_friend($userId)
    {
        $userOne = [];
        $userTwo = [];
        $friends = UserFriend::where('user_one_id',$userId)->orWhere('user_two_id',$userId)->get();
        foreach($friends as $friend){
            $userOne[] = $friend->user_one_id;
            $userTwo[] = $friend->user_two_id;
        }
        $user =  User::whereIn('id',$userOne)->orWhere('id',$userTwo)->get();
        return  UserResource::collection($user);
    }
}
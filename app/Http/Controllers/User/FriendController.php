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
        $user_id = [];
        $your_friends = [];
        $friends = UserFriend::where('user_id',$userId)->orWhere('your_friend_id',$userId)->get();
        foreach($friends as $friend){
            $user_id[] = $friend->user_id;
            $your_friends[] = $friend->your_friend_id;
        }
        $user =  User::whereIn('id',$user_id)->orWhere('id',$your_friends)->get();
        return  UserResource::collection($user);
    }
}
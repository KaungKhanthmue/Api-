<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFriend extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'one_user_id',
        'two_user_id',
        'status',
    ];

}
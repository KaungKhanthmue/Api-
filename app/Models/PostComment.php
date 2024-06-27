<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        "post_id",
        "comment_user_id",
        "comment"
    ];
}
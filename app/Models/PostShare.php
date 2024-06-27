<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostShare extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        "post_id",
        "share_user_id",
    ];
}
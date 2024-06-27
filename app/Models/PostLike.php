<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostLike extends BaseModel
{
    use HasFactory;

    protected $fillable = [
     "post_id",
     "like_user_id"
    ];


    /**
     * Relationship
     */

     
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class Post extends Model
{
   protected $table = 'posts';
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "user_id",
        "category_id",
        "status",
    ];

    /**
     * Relationship
     */

     public function category(): BelongsTo
     {
        return $this->belongsTo(Category::class);
     }

     public function user(): BelongsTo
     {
        return $this->belongsTo(User::class);
     }

     public function postLike(): BelongsToMany
     {
        return $this->belongsToMany(Post::class,'post_likes','post_id','user_id')->withTimestamps();
     }

     public function postComment(): HasMany
     {
        return $this->hasMany(PostComment::class);
     }

     public function postShare(): BelongsToMany
     {
      return $this->belongsToMany(Post::class,'post_id')->withTimestamps();
     }

     public function images(): MorphMany
     {
        return $this->morphMany(Image::class,'imageable');
     }

     public function likePost($userId)
     {
 
         $this->postLike()->attach($userId);
     }
     public function commentPost($userId, $comment)
    {
        $this->postComment()->create([
            'user_id' => $userId,
            'comment' => $comment,
            'post_id' => $this->id
        ]);
    }
}
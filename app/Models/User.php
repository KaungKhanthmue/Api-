<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable,HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship
     */

     public function friends(): BelongsToMany
     {
         return $this->belongsToMany(User::class, 'user_friends', 'user_one_id', 'user_two_id')
                     ->withTimestamps();
     }
     public function friendRequest(): BelongsToMany
     {
         return $this->belongsToMany(User::class, 'user_friends', 'user_two_id','user_one_id')
                     ->withTimestamps();
     }

     public function posts(): HasMany
     {
        return $this->hasMany(Post::class);
     }

     public function addFriend($friendId)
     {
         $ulid = (string) Str::ulid();
 
         $this->friendRequest()->attach($friendId, ['id' => $ulid]);
     }

     public function postLike(): BelongsToMany
     {
        return $this->belongsToMany(User::class,'post_likes','user_id')->withTimestamps();
     }

     public function postComment(): BelongsToMany
     {
        return $this->belongsToMany(User::class,'post_comments','user_id')->withTimestamps();
     }

     public function postShare(): BelongsToMany
     {
        return $this->belongsToMany(User::class,'post_shares','user_id')->withTimestamps();
     }

     public function images(): MorphMany
     {
        return $this->morphMany(Image::class,'imageable');
     }
    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        "name"
    ];

    /**
     * Relationship
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
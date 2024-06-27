<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends BaseModel
{
    use HasFactory;

    protected $guarded = [];
    
    public function imageable(): MorphTo
    {
        return $this->morphTo(Image::class,'imageable');
    }
}
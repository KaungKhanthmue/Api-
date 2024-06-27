<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "user" => $this->user->name,
            "user_image" => ImageResource::collection($this->user->images),
            "category" => $this->category->name,
            "status" => $this->status,
            "post_image"  => ImageResource::collection($this->images),
        ];
    }
}
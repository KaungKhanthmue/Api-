<?php

namespace App\Http\Resources;

use App\Models\PostLike;
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
            "user" => new UserResource($this->user),
            "category" => $this->category->name,
            "status" => $this->status,
            "time" => $this->created_at->diffForHumans(),
            "likeCount" => $this->postLike()->count(),
            "commentCount" => $this->postComment()->count(),
            "image"  => ImageResource::collection($this->images),
        ];
    }
}
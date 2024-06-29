<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('user','user.images','category','images','postLike','postComment')->get();

        return PostResource::collection($posts);
    }

    public function create(PostCreateRequest $request)
    {
        $requestData = $request->validated();
        $post = Post::create($requestData);
        // $images = $request->file('image');
    
        // foreach($images as $image)
        // {
        //     $this->imageCreate($image, $post, 'post');
        // }
        return response()->json([
            "message" => "post created successfully"
        ]);
    }   
}
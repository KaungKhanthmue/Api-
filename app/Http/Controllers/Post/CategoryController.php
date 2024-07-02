<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::query()->paginate(10);
        return CategoryResource::collection($category);
    }
    public function show($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return new CategoryResource($category); 
    }
    public function create(CategoryRequest $request)
    {
        $categoryData = $request->validated();
        $category = Category::create($categoryData);

        return response()->json([
            "message" => "Category created successfully",
        ]);
    }

    public function update(CategoryRequest $request, $categoryId)
    {
        $categoryData = $request->validated();
        $category = Category::findOrFail($categoryId);
        $category->update($categoryData);

        return response()->json([
            "message" => "Category updated successfully",
        ]);
    }

    public function delete($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return response()->json([
            "message" => "Category deleted successfully",
        ]);
    }
}
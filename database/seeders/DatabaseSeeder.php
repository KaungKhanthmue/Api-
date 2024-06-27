<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(20)->create();
        $categories = Category::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1111'),
        ]);
        foreach ($users as $user) {
            $user->images()->create([
                "image_type" => "profile",
                "path" => "userInfo/user.jpg",
            ]);
            $user->images()->create([
                "image_type" => "cover",
                "path" => "userInfo/cv4.jpg",
            ]);
        }
        $posts = Post::factory(20)->create();

        foreach ($posts as $post){
            $images =[
                "/post/cv2.jpg",
                "/post/cv5.jpg",
                "/post/cv6.jpg",
                "/post/cv7.jpg",
            ];
            foreach ($images as $image){
                $post->images()->create([
                    "image_type"  => "post",
                    "path" => $image
                ]);
            }
        }
        



    }
}
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

        foreach ($users as $user) {
            $user->images()->create([
                "image_type" => "profile",
                "path" => "userInfo/user.jpg",
            ]);
            $user->images()->create([
                "image_type" => "cover",
                "path" => "userInfo/cv4.jpg",
            ]);

            for($a=0;$a<20;$a++){
                $userOne = User::inRandomOrder()->first();
                $userTwo = User::whereNot('id',$user->id)->inRandomOrder()->first();

                $userOne->addFriend($userTwo->id);

                $post = Post::inRandomOrder()->first();
                
                $post->likePost($userOne->id);
                
                $post->commentPost($userOne->id, "This is a test comment");
                // $commetnt = PostComment::create([
                //     "post_id" => $post->id,
                //     "user_id" => $userOne->id,
                //     "comment" => "This is a test comment",
                // ]);
            }

            
        }
    }
}
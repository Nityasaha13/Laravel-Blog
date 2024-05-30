<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\PostCategories;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $all_cats=['developement', 'news', 'fact', 'movie','tech', 'finance'];

        for($i=1;$i<=10;$i++){

            $cat_data = [
                'name' => fake()->word(rand(3, 5)),
            ];
            $post_data = [

                'title'   => fake()->sentence(rand(3,5)),
                'content' => fake()->paragraph(rand(2,4)),

            ];

            $create_post = Post::create($post_data);
            $create_cat = Category::create($cat_data);

            $post_cata = [
                'post_id'     => $create_post->id,
                'category_id' => $create_cat->id
            ];

            $post_category = PostCategories::create($post_cata);
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategories;
use Illuminate\Http\Request;

class CreatePosts extends Controller
{
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('Blog/create', ['categories' => $categories]);
    }

    public function index()
    {
        $posts = Post::with('categories')->get();
        return view('Blog/index', ['posts' => $posts]);    
    }

    public function create_posts(Request $request)
    {
        $data = $request->all();
        $create_post = Post::create($data);
        foreach($data['categories'] as $category){
            $create = [
                'post_id' => $create_post->id,
                'category_id' => $category
            ];
            $save_category = PostCategories::create($create);
        }
        if ($data) {
            return $this->index();
        }
    }

    public function show(String $post)
    {
        $posts = Post::with('categories')->where('id', $post)->first();
        dd($posts);
    }
}

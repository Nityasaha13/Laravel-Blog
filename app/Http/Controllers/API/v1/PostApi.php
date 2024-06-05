<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostThumbnailRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategories;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ApiPostsResource;
use Hamcrest\Arrays\IsArray;

class PostApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('categories')->get();
        return ApiPostsResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $create_post = Post::create([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        $c = is_array($data['categories']) ? $data['categories'] : explode(",", $data['categories']);

        foreach($c as $category){
            $create = [
                'post_id' => $create_post->id,
                'category_id' => $category
            ];
            $save_category = PostCategories::create($create);
        }

        if($create_post){
            return "Post Created";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return ApiPostsResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $post = Post::find($id);

        if (!$post) {
            return 'error, Post not found.';
        }

        // $c = is_array($data['categories']) ? $data['categories'] : explode(",", $data['categories']);

        if($data && is_array($data['categories'])){
            $post->update([
                'title' => $data['title'],
                'content' => $data['content']
            ]);
            
            
            if (isset($data['categories'])) {
                $post->categories()->sync($data['categories']);
            }

            return "Successfull update";
        }

        return "error in updating";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post_id = Post::find($id);
        $post_id->delete();
    }
}

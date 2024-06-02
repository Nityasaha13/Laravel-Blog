<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostThumbnailRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $path = Storage::disk('public')->put('thumbnails',$request->file('thumbnail'));

        // dd($request->all());

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
            return back()->with('success', 'post created');
        }
    }

    public function edit(String $post)
    {
        $post = Post::with('categories')->find($post);
        $categories = Category::all();
        return view('Blog/edit', ['post' =>  $post, 'categories' => $categories]);
    }


    public function update(PostThumbnailRequest $request, $id)
    {
        $path = Storage::disk('public')->put('thumbnails',$request->file('thumbnail'));
        // dd($path);
        // $path = $request->file('thumbnail')->store('thumbnails','public');

        $data = $request->all();
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        
        if($old_thumb = $post->thumbnail){
            Storage::disk('public')->delete($old_thumb);
        }

        $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'thumbnail' => $path,
        ]);
        
        if (isset($data['categories'])) {
            $post->categories()->sync($data['categories']);
        }

         return redirect()->route('update.post.back',$post->id)->with('success', 'Updated successfully');
    }


    public function delete(Request $request, $id)
    {
        $post_id = Post::find($id);

        $post_id->delete();
        return redirect('/');
    }


    public function single_post(String $post){

        $post = Post::with('categories')->find($post);
        $categories = Category::all();

        return view('Blog/single', ['post' =>  $post, 'categories' => $categories]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function add_categories(Request $request){
        
        $data = new Category;
        $data->name= $request->input('categories');
        $data -> save();

        return back()->with('success', 'category added');
    }

    public function index()
    {
        $categories = Category::pluck('name', 'id');
        return view('Categories/index', ['categories' => $categories]);
    }

    public function add(){
        return view('Categories/add');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category_f = Category::find($category);
        return view('Categories/edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        // dd($data);
        // $category_data = Category::find($category);
        // Update the post with the new data
        $update = $category->update([
            'name' => $data['categories']
        ]);
        return back()->with('success', "Updated category");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $category)
    {
        $cat = Category::find($category);
        $cat->delete();
        return redirect('/categories');
    }


    public function category_collection(Category $category)
    {
        $post_ids = $category->posts()->pluck('posts.id');

        $posts= Post::find($post_ids); 

        // dd($posts);

        return view('Categories/category-collection',['posts' => $posts, 'category' => $category]);
    }
}

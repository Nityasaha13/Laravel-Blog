<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreatePosts;
use App\Http\Controllers\AddCategoryController;
use App\Models\Post;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CreatePosts::class, 'index'])->name('users.index');

Route::get('/blog', [CreatePosts::class, 'index'])->name('users.index');
Route::get('/edit/{post}', [CreatePosts::class, 'edit']);

Route::get('/categories',[AddCategoryController::class,'index']);

Route::get('/create-post',[CreatePosts::class, 'create'])->name('blog-create');
Route::get('/show',[CreatePosts::class, 'index']);

Route::get('/add-category',function(){
    return view('Categories/add');
})->name('add-category');

Route::get('/edit-category',[AddCategoryController::class,'edit'])->name('edit-category');

Route::get('/edit-posts',function(){
    return view('Blog/edit');
})->name('edit-posts');

Route::post('/create-post',[CreatePosts::class, 'create_posts']);
Route::post('/add-category',[AddCategoryController::class, 'add_categories']);
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

Route::get('/', [CreatePosts::class, 'index'])->name('posts.index');


Route::get('/blog', [CreatePosts::class, 'index'])->name('posts.index');
Route::post('/create-post',[CreatePosts::class, 'create_posts'])->name('create-post');
Route::get('/create-post-form',[CreatePosts::class, 'create'])->name('create-post-form');
// Route::post('/create-post',[CreatePosts::class, 'create_posts'])->name('create-post');
Route::get('/edit/{post}', [CreatePosts::class, 'edit'])->name('edit-post');
Route::put('/update-post/{post}',[CreatePosts::class, 'update'])->name('update.post');
Route::get('/update-post/{post}',[CreatePosts::class, 'edit'])->name('update.post.back');
Route::get('/delete-post/{post}',[CreatePosts::class, 'delete'])->name('delete-post');


Route::get('/categories',[AddCategoryController::class,'index'])->name('categories.show');
Route::post('/add-category',[AddCategoryController::class, 'add_categories'])->name('category.store');
Route::get('/add-category-form',[AddCategoryController::class,'add'])->name('add-category');
Route::get('/edit-category/{category}',[AddCategoryController::class,'edit'])->name('edit-category');
Route::put('/update-category/{category}',[AddCategoryController::class,'update'])->name('update-category');
Route::get('/update-category/{category}',[AddCategoryController::class,'edit'])->name('update-category-back');
Route::get('/delete-category/{categoryid}',[AddCategoryController::class, 'destroy'])->name('delete-category');

Route::get('/post/{postid}',[CreatePosts::class, 'single_post'])->name('single-post');
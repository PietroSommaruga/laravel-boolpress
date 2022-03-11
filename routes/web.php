<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@index");

Auth::routes();

// Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');
// Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.product.index');
// Route::get('/admin/products/create', 'Admin\ProductController@index')->name('admin.product.create');
// Route::get('/admin/products/edit', 'Admin\ProductController@index')->name('admin.product.edit');
// Route::get('/admin/posts', 'Admin\PostController@index')->name('admin.post.index');
// Route::get('/admin/posts/create', 'Admin\PostController@index')->name('admin.post.create');
// Route::get('/admin/posts/edit', 'Admin\PostController@index')->name('admin.post.edit');

Route::middleware("auth")
->namespace("Admin")
->prefix("admin")
->name("admin.")
->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/products', 'ProductController@index')->name('product.index');
    Route::get('/products/create', 'ProductController@index')->name('product.create');
    Route::get('/products/edit', 'ProductController@index')->name('product.edit');
    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::get('/posts/create', 'PostController@index')->name('post.create');
    Route::get('/posts/edit', 'PostController@index')->name('post.edit');

    Route::resource("comments", "CommentController");
});
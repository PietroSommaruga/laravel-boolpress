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
// disattivo per far gestire la homepage da vue
// Route::get('/', "HomeController@index");

Auth::routes();

Route::middleware("auth")
->namespace("Admin")
->prefix("admin")
->name("admin.")
->group(function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource("posts", "PostController");
    Route::resource("comments", "CommentController");
    Route::resource("users", "UserController");

    Route::get("contacts", "ContactController@index")->name("contacts.index");
});


Route::get("{any?}", function() {
    return view("home");
})->where("any", ".*");
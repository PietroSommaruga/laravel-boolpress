<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\Traits\SlugGenerator;
use Illuminate\Http\Request;

class PostController extends Controller {
  use SlugGenerator;

  public function index(Request $request) {
    $filter = $request->input("filter");

    if ($filter) {
      $posts = Post::where("title", "LIKE", "%$filter%")->paginate(4);
    } else {
      $posts = Post::paginate(4);
    }

    $posts->load("user", "category");

    // $posts->load("user", "category");


    return response()->json($posts);
  }  

  public function store(Request $request) {
    $data = $request->validate([
      "title" => "required|min:5",
      "content" => "required|min:20",
      "category_id" => "nullable",
      "tags" => "nullable"
    ]);

    $newPost = new Post();
    $newPost->fill($data);
    $newPost->user_id = 1;
    $newPost->slug = $this->generateUniqueSlug($data["title"]);
    $newPost->save();

    if(key_exists("tags", $data)){
      $newPost->tags()->attach($data["tags"]);
    }

    return response()->json($newPost);
  }


  public function show($slug){
    $post = Post::where("slug", $slug)
    ->with(["tags", "user", "category"])
    ->first();
    // $post->load("user");

    if(!$post) {
      abort(404);
    };

    return response()->json($post);
  }
}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
Use \Carbon\Carbon;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
        return view("index", compact("posts"));
    }

    public function store(Request $request) {
        $request->validate(["title" => "required|max:64", "author" => "required|max:64", "content" => "required"]);
        $post = Post::create(["title" => $request->title, "author" => $request->author, "content" => $request->content]);
        $postID = $post->id;

        return redirect()->route("showPost", $postID);
    }

    public function update(Request $request)    {
        $currentTime = Carbon::now();

        $request->validate(["title" => "required|max:64", "content" => "required"]);
        Post::where('id', $request->id)->update(["title" => $request->title, "content" => $request->content, "updated_at" => $currentTime]);
        $postID = $request->id;

        return redirect()->route("showPost", $postID);
    }

    public function destroy($postID) {
        Post::latest()->where('id', $postID)->first() -> delete();
        return redirect() -> route("index");
    }

    public function showPost($postID)   {
        $post = Post::latest()->where('id', $postID)->first();
        return view('post', compact('post'));
    }
    public function updatePost($postID)   {
        $post = Post::latest()->where('id', $postID)->first();
        return view('update', compact('post'));
    }
}

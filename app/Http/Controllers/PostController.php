<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
        return view("index", compact("posts"));
    }

    public function store(Request $request) {
        $request->validate(["title" => "required|max:255", "author" => "required|max:255", "content" => "required|max:65535"]);
        Task::create(["title" => $request->title, "author" => $request->author, "content" => $request->content]);

        return redirect()->route("index");
    }

    public function destroy(Task $task) {
        $task -> delete();
        return redirect() -> route("index");
    }
}

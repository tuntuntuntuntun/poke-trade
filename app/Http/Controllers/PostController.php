<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // 投稿を全て取得
        $posts = Post::all();

        return view('posts/index', [
            'posts' => $posts,
        ]);
    }

    public function showCreateForm()
    {
        return view('posts/create');
    }

    public function create(CreatePost $request)
    {
        $posts = new Post();

        $posts->want = $request->want;
        $posts->give = $request->give;

        $posts->save();

        return redirect()->route('posts.index');
    }
}

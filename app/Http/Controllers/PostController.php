<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePost;
use App\Http\Requests\EditPost;
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

    public function showEditForm(int $post_id)
    {
        $post = Post::find($post_id);

        return view('posts/edit', [
            'post' => $post,
        ]);
    }

    public function edit(int $post_id, EditPost $request)
    {
        $post = Post::find($post_id);

        $post->want = $request->want;
        $post->give = $request->give;

        $post->save();

        return redirect()->route('posts.index');
    }

    public function showDeleteForm(int $post_id)
    {
        $post = Post::find($post_id);

        return view('posts/delete', [
            'post' => $post,
        ]);
    }

    public function delete(int $post_id)
    {
        $post = Post::find($post_id);

        $post->delete();

        return redirect()->route('posts.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CreateComment;
use App\Http\Requests\EditComment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function showCreateForm(Post $post)
    {
        return view('comments/create', [
            'post' => $post,
        ]);
    }

    public function create(Post $post, CreateComment $request)
    {
        $comment = new Comment();

        $comment->content = $request->content;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;

        Auth::user()->comments()->save($comment);

        return redirect()->route('posts.detail', [
            'post' => $post->id,
        ]);
    }

    public function showEditForm(Post $post, Comment $comment)
    {
        return view('comments/edit', [
            'comment' => $comment,
            'post' => $post,
        ]);
    }

    public function edit(Post $post, Comment $comment, EditComment $request)
    {
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('posts.detail', [
            'post' => $post,
        ]);
    }

    public function showDeleteForm(Post $post, Comment $comment)
    {
        return view('comments/delete', [
            'comment' => $comment,
            'post' => $post,
        ]);
    }

    public function delete(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.detail', [
            'post' => $post,
        ]);
    }
}

// 違う投稿へのコメントが表示されないようにする
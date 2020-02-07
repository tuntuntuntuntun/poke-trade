<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests\CreatePost;
use App\Http\Requests\EditPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        $query = Post::query();

        if ($request->has('want')) {
            $query->where('want', 'like', '%'.$request->get('want').'%');
        }
        
        if ($request->has('give')) {
            $query->where('give', 'like', '%'.$request->get('give').'%');
        }
            
        if (is_null($request->want) && is_null($request->give)) {
            // 欲しいポケモン、譲るポケモンともに値がない場合
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $posts = $query->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('posts/index', [  
            'users' => $users,
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

        $posts->title = $request->title;
        $posts->want = $request->want;
        $posts->give = $request->give;

        Auth::user()->posts()->save($posts);

        return redirect()->route('posts.index');
    }

    public function showEditForm(Post $post)
    {
        return view('posts/edit', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post, EditPost $request)
    {
        $post->title = $request->title;
        $post->want = $request->want;
        $post->give = $request->give;

        $post->save();

        return redirect()->route('posts.index');
    }

    public function showDeleteForm(Post $post)
    {
        return view('posts/delete', [
            'post' => $post,
        ]);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function showSearchForm()
    {
        return view('posts/search');
    }

    public function showDetail(Post $post, Comment $comment)
    {
        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();

        return view('posts/detail', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
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
            $posts = Post::paginate(3);
        } else {
            $posts = $query->paginate(1);
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
        return view('posts.search');
    }
}

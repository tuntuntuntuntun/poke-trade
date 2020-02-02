<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function showMyPage()
    {
        // $user_id == Auth::user()->id の投稿を表示
        $user_id = Auth::user()->id;

        $posts = Post::where('user_id', $user_id)->get();

        return view('posts/mypage', [
            'posts' => $posts,
        ]);
    }
}

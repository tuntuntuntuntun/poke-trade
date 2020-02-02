<?php

namespace App\Policies;

use App\User;
use App\Post;

class PostPolicy
{
    public function view(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
}

<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;
use App\Models\Comment;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Comment $comment)
{
    return $user->id === $comment->user_id || $user->id === $comment->post->user_id || $user->role === Role::Admin;
}
}

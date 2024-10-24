<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate(['comment' => 'required|string']);

    $post->comments()->create([
        'user_id' => $request->user()->id,
        'comment' => $request->comment,
    ]);

    return redirect()->route('posts.show', $post);
}

public function destroy(Comment $comment)
{
    $comment->delete();
    return redirect()->back();
}
}

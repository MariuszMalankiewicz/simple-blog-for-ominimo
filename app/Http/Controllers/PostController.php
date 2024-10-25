<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }
    public function create()
{
    return view('posts.create');
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $request->user()->posts()->create($request->only('title', 'content'));

    return redirect()->route('posts.index');
}

public function show(Post $post)
{
    $comments = $post->comments()->with('user')->get();
    return view('posts.show', compact('post', 'comments'));
}
public function edit(Post $post)
{
    Gate::authorize('update', $post);

    return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    Gate::authorize('update', $post);

    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $post->update($request->only('title', 'content'));

    return redirect()->route('posts.index', $post);
}

public function destroy(Post $post)
{
    Gate::authorize('delete', $post);

    $post->delete();

    return redirect()->route('posts.index');
}

}

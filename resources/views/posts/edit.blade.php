<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


<div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$post->title}}" required class="border rounded p-2 w-3/4">
        <textarea name="content" required class="border rounded p-2 mt-4 w-3/4">{{$post->content}}</textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 block">Edit</button>
    </form>
</div>
</x-app-layout>
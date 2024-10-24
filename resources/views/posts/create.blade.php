<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


<div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" required class="border rounded p-2 w-3/4">
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror 
        <textarea name="content" placeholder="Content" required class="border rounded p-2 mt-4 w-3/4"></textarea>
        @error('content')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror 
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 block">Create</button>
    </form>
    <!-- Validation errors -->

</div>
</x-app-layout>
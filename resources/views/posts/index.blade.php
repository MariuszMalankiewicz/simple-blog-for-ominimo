<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Posts</h1>
    <ul class="mt-4">
        @foreach ($posts as $post)
            <li class="flex flex-col bg-slate-200 my-2 w-[500px] p-4 rounded">
                <h3 class="font-bold">{{ $post->title }}</h3>
                <p class="my-3">{{ $post->content }}</p>
                <div class="flex justify-between mb-1">  
                    <div class="flex space-x-4">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-green-600">Show</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                    </div>
                    <div>
                        <span class="">by {{ $post->user->name }}</span>
                    </div>
                </div>
            </li>
            <div class="mt-6">
        @endforeach
    </ul>
</div>
</x-app-layout>

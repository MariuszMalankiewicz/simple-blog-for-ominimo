<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Posts</h1>
    <ul class="flex flex-wrap gap-4 justify-center">
        @foreach ($posts as $post)
            <li class="bg-slate-200 w-[300px] sm:w-[350px] my-2 p-4 rounded">
                <h3 class="font-bold">{{ $post->title }}</h3>
                <div class="flex justify-between mb-1">  
                    <div class="flex space-x-4">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-green-600">Show</a>
                    @can('update', $post)
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500">Edit</a>
                    @endcan
                    @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                    @endcan
                    </div>
                    <div>
                        <span class="">by {{ $post->user->name }}</span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="w-1/2 mx-auto py-8">
        {{ $posts->links() }}
    </div>
</div>
</x-app-layout>

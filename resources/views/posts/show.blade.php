<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="container mx-auto">
        <h1 class="text-2xl font-bold my-4">Posts {{$post->title}}</h1>
        <p class="my-4 blocks">{{ $post->content }}</p>
        <a href="{{route('posts.index')}}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Back</a>
    </div>
</x-app-layout>

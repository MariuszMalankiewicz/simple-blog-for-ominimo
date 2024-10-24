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
            <li class="flex flex-col bg-slate-200 m-2 max-w-[500px] p-4 rounded">
                <a href="#" class="text-blue-600">{{ $post->title }}</a>
                <p class="">{{ $post->content }}</p>
                <span class="text-end">by {{ $post->user->name }}</span>
            </li>
        @endforeach
    </ul>
</div>
</x-app-layout>

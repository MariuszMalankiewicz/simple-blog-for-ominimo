<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="container mx-auto">
        <!-- show post -->
        <h1 class="text-2xl font-bold my-4">Posts {{$post->title}}</h1>
        <p>{{ $post->content }}</p>
       
        <!--display comments -->
        <div class="mt-6">
        <h2 class="text-xl font-bold">Comments</h2>
        @forelse ($post->comments as $comment)
            <div class="border-b py-2">
                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}</p>

                <!-- delete comments -->
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>

            @empty
                <p>No comments yet. Be the first to comment!</p>
            @endforelse
        </div>

        <!-- add comments -->
        @auth
        <div class="mt-6">
            <h2 class="text-xl font-bold mb-4">Add a Comment</h2>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <textarea name="comment" rows="3" required class="border rounded w-[500px] py-2 px-3 mt-1 @error('comment') border-red-500 @enderror"
                        placeholder="Write your comment..."></textarea>

                    <!-- Validation errors -->
                    @error('comment')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror 
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Comment</button>
                <a href="{{route('posts.index')}}" class="bg-gray-200 text-gray-700 px-4 py-2.5 ml-2 rounded">Back</a>
            </form>
        </div>
        @else
            <p class="mt-6 text-gray-500">You must be <a href="{{ route('login') }}" class="text-blue-500 hover:underline">logged in</a> to add a comment.</p>
        @endauth
    </div>

</x-app-layout>

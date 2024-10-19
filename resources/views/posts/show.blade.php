@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1 class="text-3xl font-bold mb-6">{{ $post->title }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <p>{{ $post->content }}</p>
        <p class="text-sm text-gray-500 mt-4">By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</p>

        @auth
            @if ($post->user_id === auth()->id())
                <div class="flex mt-4">
                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <h2 class="text-2xl font-bold mb-4">Comments</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        @foreach ($post->comments as $comment)
            <div class="border-b pb-4 mb-4">
                <p>{{ $comment->comment }}</p>
                <p class="text-sm text-gray-500">By {{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
    </div>

    @auth
        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-6 bg-white shadow-md rounded-lg p-6">
            @csrf
            <textarea name="comment" rows="4" class="w-full border-gray-300 rounded-lg p-2" placeholder="Leave a comment..." required></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Add Comment</button>
        </form>
    @endauth
@endsection

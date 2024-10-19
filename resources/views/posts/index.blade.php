@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">All Posts</h1>
        @auth
            <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Post</a>
        @endauth
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        @foreach ($posts as $post)
            <div class="border-b pb-4 mb-4">
                <h2 class="text-2xl font-semibold">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                </h2>
                <p class="text-gray-600">{{ Str::limit($post->content, 150) }}</p>
                <p class="text-sm text-gray-500">By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
    </div>
@endsection

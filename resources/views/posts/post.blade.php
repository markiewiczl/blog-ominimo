@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="w-full border-gray-300 rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content:</label>
            <textarea name="content" id="content" rows="6" class="w-full border-gray-300 rounded-lg p-2" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Post</button>
    </form>
@endsection

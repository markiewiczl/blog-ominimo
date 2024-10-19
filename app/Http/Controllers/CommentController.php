<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param $postId
     * @return RedirectResponse
     */
    public function store(Request $request, $postId): RedirectResponse
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($postId);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Comment added successfully.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $post = $comment->post;

        if (Auth::id() !== $comment->user_id && Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->route('posts.show', $post->id)->with('success', 'Comment deleted successfully.');
    }
}

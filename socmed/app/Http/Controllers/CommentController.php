<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::with('user', 'post')->get();
        return view('comment', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // Validate the request data
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ]);

        // Create the comment with the validated data and the authenticated user's ID
        $comments = Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $validatedData['post_id'],
            'content' => $validatedData['content'],
        ]);

        // Redirect to the post's comment section with a success message
        return redirect()
            ->route('comment.show', ['id' => $comments->post_id])
            ->with('status', 'Comment posted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::find($id);
        // $comments = $post->comments()->with('user')->get();
        return view('comment', compact( 'posts'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

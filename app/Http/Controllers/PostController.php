<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post = new Post();
        $posts= $post->allPosts();
        return view('manage-posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create-post');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //title should have a maximum of 100 characters
        //content should have a maximum of 1000 characters
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:1000',
        ]);

        $post= new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->save();
        return redirect()->route('posts.index');

    }

    public function like(Post $post)
    {
        $user = auth()->user();

        if (!$post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->create(['user_id' => $user->id]);
            $post->like_count++;
            $post->save();
        }

        return response()->json(['success' => true, 'like_count' => $post->like_count]);
    }

    public function dislike(Post $post)
    {
        $user = auth()->user();

        if ($post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->where('user_id', $user->id)->delete();
            if ($post->like_count > 0) {
                $post->like_count--;
            }
            $post->save();
        }

        return response()->json(['success' => true, 'like_count' => $post->like_count]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('show-post', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //update post
        return view('edit-post', compact('post'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //update post
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:1000',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        //update existing post
        $post->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //delete the post
        $post->delete();
        return redirect()->route('posts.index');
    }
}

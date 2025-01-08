<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display all posts (Read)
    public function index()
    {
        $posts = Posts::all();
        return view('posts.index', compact('posts'));
    }

    // Show create form (Create)
    public function create()
    {
        return view('posts.create');
    }

    // Store new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:tbl_posts,slug',
            'content' => 'required',
        ]);

        Posts::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Show edit form (Update)
    public function edit(Posts $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update post
    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:tbl_posts,slug,' . $post->id,
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Delete post (Delete)
    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}

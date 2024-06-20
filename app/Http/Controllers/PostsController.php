<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use App\Models\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();

        return view('admin.contents.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = User::all();
        $categories = Category::all();
        return view('admin.contents.posts.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'content' => 'required',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published,archived',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Posts::create($data);

        return redirect()->route('admin.posts.index')->with('message', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Posts::with(['user', 'category'])->findOrFail($id);
        return view('admin.contents.posts.show', compact('post'));
    }

    public function edit(Posts $post)
    {
        $authors = User::all();
        $categories = Category::all();
        return view('admin.contents.posts.edit', compact('post','authors','categories'));
    }

    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'content' => 'required',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published,archived',
        ]);

        $post->update($request->all());

        return redirect()->route('admin.posts.index')->with('message', 'Post updated successfully.');
    }

    public function destroy(Posts $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}

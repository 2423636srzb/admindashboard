<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with(['category', 'tags'])->get();

        return view('admin.contents.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.contents.posts.create', compact('authors', 'categories','tags'));
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
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Ensure each tag exists in the tags table
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        $post = Posts::create($data);
    
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }
    
        return redirect()->route('admin.posts.index')->with('message', 'Post created successfully.');
    }
    

    public function show($id)
    {
        $post = Posts::with(['user', 'category','tags'])->findOrFail($id);
        return view('admin.contents.posts.show', compact('post'));
    }

    public function edit(Posts $post)
    {
        $authors = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.contents.posts.edit', compact('post','authors','categories','tags'));
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
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $post->update($data);

    if ($request->has('tags')) {
        $post->tags()->sync($request->tags);
    } else {
        $post->tags()->detach();
    }

    return redirect()->route('admin.posts.index')->with('message', 'Post updated successfully.');
}


    public function destroy(Posts $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}

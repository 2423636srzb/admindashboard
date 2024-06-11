<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('admin.contents.index', compact('contents'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.contents.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        $content = Content::create($request->all());
        $content->categories()->attach($request->categories);
        $content->tags()->attach($request->tags);

        return redirect()->route('admin.contents.index')->with('message', 'Content created successfully.');
    }

    public function show(Content $content)
    {
        return view('admin.contents.show', compact('content'));
    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.contents.edit', compact('content', 'categories', 'tags'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        $content->update($request->all());
        $content->categories()->sync($request->categories);
        $content->tags()->sync($request->tags);

        return redirect()->route('admin.contents.index')->with('message', 'Content updated successfully.');
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('admin.contents.index')->with('message', 'Content deleted successfully.');
    }
}


@extends('layouts.admin')

@section('main')
<div class="container">
    <h1>Create New Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
   <div class="row">
        <div class="form-group col-md-6">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group col-md-6">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="summary">Summary</label>
            <textarea name="summary" class="form-control" id="summary" rows="3">{{ old('summary') }}</textarea>
        </div>
    </div>

    <div class="row">

        <div class="form-group col-md-4">
            <label for="author_id">Author</label>
            <select name="author_id" class="form-control" id="author_id" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="category_id">Tags</label>
            <select name="tag_id" class="form-control" id="tag_id" required>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="published_at">Publish Date</label>
            <input type="datetime-local" name="published_at" class="form-control" id="published_at" value="{{ old('published_at') }}">
        </div>
    
        <div class="form-group col-md-4">
            <label for="image">Featured Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="meta_description">Meta Description</label>
            <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ old('meta_description') }}">
        </div>

        <div class="form-group col-md-6">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords') }}">
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection

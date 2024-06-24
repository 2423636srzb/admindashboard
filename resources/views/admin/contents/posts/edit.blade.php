@extends('layouts.admin')

@section('main')
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $post->slug) }}" required>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-6">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="summary">Summary</label>
                <textarea name="summary" class="form-control" id="summary" rows="3">{{ old('summary', $post->summary) }}</textarea>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-4">
                <label for="author_id">Author</label>
                <select name="author_id" class="form-control" id="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $post->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="category_id">Tag</label>
                <select name="tag_id" class="form-control" id="tag_id" required>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $post->tag_id == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-4">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ $post->status == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="published_at">Publish Date</label>
                <input type="datetime-local" name="published_at" class="form-control" id="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
            </div>
        
            <div class="form-group col-md-4">
                <label for="image">Featured Image</label>
                @if ($post->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 100px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" id="image">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-6">
                <label for="meta_description">Meta Description</label>
                <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ old('meta_description', $post->meta_description) }}">
            </div>

            <div class="form-group col-md-6">
                <label for="meta_keywords">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection

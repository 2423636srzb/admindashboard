<!-- resources/views/contents/create.blade.php -->

@extends('layouts.admin')

@section('main')
    <div class="container">
        <h1>Create Content</h1>
        <form action="{{ route('admin.contents.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" class="form-control" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

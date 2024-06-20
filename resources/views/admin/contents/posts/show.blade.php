@extends('layouts.admin')

@section('main')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p><strong>Author:</strong> {{ $post->user->name }}</p>
    <p><strong>Category:</strong> {{ $post->category->name }}</p>
    <p><strong>Status:</strong> {{ $post->status }}</p>
    <p><strong>Published At:</strong> {{ $post->published_at }}</p>

    @if($post->image)
        <div>
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 100%;">
        </div>
    @endif

    <div>
        <h2>Content</h2>
        <p>{!! nl2br(e($post->content)) !!}</p>
    </div>

    <div>
        <h2>Summary</h2>
        <p>{{ $post->summary }}</p>
    </div>

    <div>
        <h2>Meta Description</h2>
        <p>{{ $post->meta_description }}</p>
    </div>

    <div>
        <h2>Meta Keywords</h2>
        <p>{{ $post->meta_keywords }}</p>
    </div>

    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back to Posts</a>
</div>
@endsection

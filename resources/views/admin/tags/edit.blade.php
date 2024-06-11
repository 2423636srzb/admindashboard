<!-- resources/views/tags/edit.blade.php -->

@extends('layouts.admin')

@section('main')
    <div class="container">
        <h1>Edit Tag</h1>
        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $tag->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

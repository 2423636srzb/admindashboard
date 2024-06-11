<!-- resources/views/tags/create.blade.php -->

@extends('layouts.admin')

@section('main')
    <div class="container">
        <h1>Create Tag</h1>
        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

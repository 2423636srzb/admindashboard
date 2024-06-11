<!-- resources/views/api_keys/edit.blade.php -->

@extends('layouts.admin')

@section('main')
    <div class="container">
        <h1>Edit API Key</h1>
        <form action="{{ route('admin.api_keys.update', $apiKey->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $apiKey->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

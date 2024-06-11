<!-- resources/views/tags/index.blade.php -->

@extends('layouts.admin')

@section('main')
    <div class="container">
        <h1>Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create Tag</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<!-- resources/views/contents/index.blade.php -->

@extends('layouts.admin')

@section('main')
    <div class="container">
        <h1>Contents</h1>
        <a href="{{ route('admin.contents.create') }}" class="btn btn-primary">Create Content</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->title }}</td>
                        <td>
                            <a href="{{ route('admin.contents.edit', $content->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                            <a href="{{ route('admin.contents.show', $content->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

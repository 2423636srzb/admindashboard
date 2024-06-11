<!-- resources/views/api_keys/index.blade.php -->

@extends('layouts.admin')

@section('main')
    <div class="container">
        <h1>API Keys</h1>
        <a href="{{ route('admin.api_keys.create') }}" class="btn btn-primary">Create API Key</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Key</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apiKeys as $apiKey)
                    <tr>
                        <td>{{ $apiKey->id }}</td>
                        <td>{{ $apiKey->name }}</td>
                        <td>{{ $apiKey->key }}</td>
                        <td>
                            <a href="{{ route('admin.api_keys.edit', $apiKey->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.api_keys.destroy', $apiKey->id) }}" method="POST" style="display:inline-block;">
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

@extends('layouts.admin')

@section('main')
<div class="container mt-5">
    <h1>Manage Backups</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.backups.create') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Create Backup</button>
    </form>

    <h2 class="mt-5">Existing Backups</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Backup Files</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($backupFiles as $file)
                <tr>
                    <td>{{ $file }}</td>
                    <td>
                        <a href="{{ route('admin.backups.download', $file) }}" class="btn btn-success">Download</a>
                        <form action="{{ route('admin.backups.delete', $file) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

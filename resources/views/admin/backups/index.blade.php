@extends('layouts.admin')

@section('main')
    <h1>Database Backups</h1>

    <ul>
        @foreach($backups as $backup)
            <li>
                {{ $backup }}
                <a href="{{ route('admin.backups.download', $backup) }}">Download</a>
                <a href="{{ route('admin.backups.delete', $backup) }}">Delete</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.backups.create') }}">Create New Backup</a>
@endsection
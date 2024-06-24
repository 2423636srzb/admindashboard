@extends('layouts.admin')

@section('main')
<div class="container">
    <h1>Notifications</h1>
    <ul class="list-group">
        @foreach($notifications as $notification)
            <li class="list-group-item {{ $notification->read_at ? 'bg-light' : '' }}">
                <strong>New User Registered:</strong> {{ $notification->data['user_name'] }} ({{ $notification->data['user_email'] }})
                <div class="float-right">
                    @if ($notification->read_at)
                        <form action="{{ route('admin.notifications.unread', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Mark as Unread</button>
                        </form>
                    @else
                        <form action="{{ route('admin.notifications.read', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Mark as Read</button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection

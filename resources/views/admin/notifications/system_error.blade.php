@extends('layouts.admin')

@section('main')
<div class="container">
    <h2>Critical System Errors</h2>
    @if($notifications->isEmpty())
        <p>No critical system errors.</p>
    @else
        <ul>
            @foreach($notifications as $notification)
                <li>
                    {{ $notification->data['errorDetails'] }}
                    <br>
                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

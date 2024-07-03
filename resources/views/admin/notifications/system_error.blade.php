@extends('layouts.admin')

@section('main')
<div class="container">
    <div class="error-title">A Critical Error Occurred</div>
    <div class="error-details">
        <p>We are experiencing technical difficulties. Please try again later.</p>
        @if(config('app.debug'))
            <p>{{ $exception->getMessage() }}</p>
            <pre>{{ $exception->getTraceAsString() }}</pre>
        @endif
    </div>
</div>
@endsection

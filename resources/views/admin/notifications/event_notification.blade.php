@extends('layouts.admin')
@section('main')
<div class="row">
    <div class="col-md-6">
        
<form action="{{route('admin.event.send')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Send To All User:</label>
        {{-- <input type="email" name="email" id="email" class="form-control" required> --}}
    </div>
    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="messages">Message:</label>
        <textarea name="messages" id="messages" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Email</button>
</form>

</div>
</div>
@endsection
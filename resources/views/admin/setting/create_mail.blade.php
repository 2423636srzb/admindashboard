@extends('layouts.admin')

@section('main')
<div class="row">
    <div class="col-md-6 m-3">

    <h1 class="mt-2 mb-5">Send Email</h1>
    {{-- {% with messages = get_flashed_messages(with_categories=true) %}
        {% if messages %}
            {% for category, message in messages %}
                <div class="alert alert-{{ category }}">{{ message }}</div>
            {% endfor %}
        {% endif %}
    {% endwith %} --}}
    <form method="POST" action="{{ route('admin.email.send') }}">
        @csrf
        <div class="form-group">
            <label for="recipient">Recipient</label>
            <input type="email" class="form-control" id="recipient" name="recipient" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>


</div>
</div>
@endsection
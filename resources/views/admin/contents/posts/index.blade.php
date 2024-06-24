@extends('layouts.admin')

@section('main')
<div class="col-12">
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mt-3 mb-3">Create Post</a>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Posts</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Published At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->status }}</td>
                    <td>{{ $post->published_at }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
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
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection

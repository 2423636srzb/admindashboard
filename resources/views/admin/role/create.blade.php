@extends('layouts.admin')

@section('main')

<div class="col-md-6 m-4">
    <!-- general form elements -->
    <div class="col-5 m-2">
        <a href="{{route('admin.roles.index')}}"><button class="btn btn-flat">Go Back</button></a>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" >Creating Role</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{route('admin.roles.store')}}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role Name">
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>

@endsection
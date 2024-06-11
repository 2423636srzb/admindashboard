@extends('layouts.admin')

@section('main')

<div class="col-md-6 m-4">
    <div class="col-5 m-2">
        <a href="{{route('admin.permissions.index')}}"><button class="btn btn-flat">Go Back</button></a>
    </div>
    <!-- general form elements -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" >Update Permission</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{route('admin.permissions.update',$permission)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}" placeholder="Enter Permission Name">
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>

@endsection
@extends('layouts.admin')

@section('main')

<div class="col-md-6 m-4">
    <!-- general form elements -->
    <div class="col-5 m-2">
        <a href="{{route('admin.roles.index')}}"><button class="btn btn-flat">Go Back</button></a>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" >Update Role</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{route('admin.roles.update',$role->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" id="name" value="{{$role->name}}" name="name" placeholder="Enter Role Name">
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  <div class="mt-6 p-2">
    <h2 class="text-2xl mb-3 font-semibold">Role Permissions</h2>
    <div class="m-2 d-flex">
      @foreach ($role->permissions as $role_permission)
      <form method="POST" action="{{route('admin.roles.permission.revoke',[$role->id,$role_permission->id])}}" onsubmit="return confirm('Are You Sure You Want Remove This Permission ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-info ml-2">{{$role_permission->name}}</button>
</form> 
      @endforeach
    </div>
    <form method="POST" action="{{route('admin.roles.permission',$role->id)}}">
      @csrf
  
      <div class="card-body">
        <div class="form-group">
          <label for="permission">Permission Name</label>
          <select class="form-select" id="permission" name="permission" aria-label="Default select example">
            @foreach ($permission as $perm)
              
            <option value="{{$perm->name}}">{{$perm->name}}</option>
            @endforeach
          </select>
        </div>
        @error('name')
          <span class="text-red-400 sm">{{$message}}</span>
        @enderror
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Assign</button>
      </div>
    </form>
  </div>
  </div>

@endsection
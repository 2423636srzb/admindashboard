@extends('layouts.admin')

@section('main')

<div class="col-md-6 m-4">
    <!-- general form elements -->
    <div class="col-5 m-2">
        <a href="{{route('admin.user.index')}}"><button class="btn btn-flat">Go Back</button></a>
    </div>
    <div class="card">
      <div class="m-1 p-1">Name : {{$user->name}}</div>
      <div class="m-1 p-1">Email : {{$user->email}}</div>
    </div>
    <!-- /.card -->
  <div class="mt-6 p-2">
    <h2 class="text-2xl mb-3 font-semibold">User Role</h2>
    <div class="m-2 d-flex">
        @if ($user->roles)

      @foreach ($user->roles as $user_roles)
      <form method="POST" action="{{route('admin.user.roles.remove',[$user->id,$user_roles->id])}}" onsubmit="return confirm('Are You Sure You Want Remove This Role ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-info ml-2">{{$user_roles->name}}</button>
</form> 
      @endforeach
      @endif
    </div>
    <form method="POST" action="{{route('admin.user.roles',$user->id)}}">
      @csrf
  
      <div class="card-body">
        <div class="form-group">
          <label for="roles">Roles</label>
          <select class="form-select" id="roles" name="roles" aria-label="Default select example">
            @foreach ($role as $roles)
              
            <option value="{{$roles->name}}">{{$roles->name}}</option>
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
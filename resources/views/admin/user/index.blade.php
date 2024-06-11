@extends('layouts.admin')
@section('main')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-9">
     <button type="button" class="btn btn-primary m-3">New User</button>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered ">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user as $users)
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->role}}</td>
                    <td>
                     <a href="{{route('admin.user.show',$users->id)}}"> <button type="button" class="btn btn-secondary">Edit</button></a>
                     <a href="{{route('admin.user.destroy',$users->id)}}"> <button type="button" class="btn btn-danger">Delete</button></a>
                  </td>
                  </tr>
                @endforeach
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  @endsection
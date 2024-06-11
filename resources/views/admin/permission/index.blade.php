@extends('layouts.admin')
@section('main')

<div class="row mb-2">
    <div class="col-7 text-right m-3 ml-5">
      <a href="{{route('admin.permissions.create')}}">  <button class="btn btn-primary">Create Permission</button></a>
    </div>
</div>
<div class="row">
    <div class="col-7 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Permissions Table</h3>
           
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permission as $permissions)
                        <tr>
                            <td>183</td>
                            <td>{{$permissions->name}}</td>
                            <td>
                              <div class="d-flex">
                              <a href="{{route('admin.permissions.edit',$permissions->id)}}"><button class="btn btn-outline-dark" style="width: 70px; height: 35px;">Edit</button></a> 
                              <form method="POST" action="{{route('admin.permissions.destroy',$permissions->id)}}" onsubmit="return confirm('Are You Sure ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger ml-2" style="width: 70px; height: 35px; ">Delete</button>
                        </form>
                      </div>
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
</div>

@endsection
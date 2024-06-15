@extends('layouts.admin')

@section('main')
<div class="col-md-6  m-4">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Upload File</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form  method="post" action="{{route('files.store')}}"  enctype="multipart/form-data">
        @csrf
      <div class="card-body">

        <div class="form-group">
            <label for="fileName">File Name</label>
            <div class="input-group">
                <input type="text" class="form-control" id="file_name" name="file_name" placeholder="Enter file name">
             
            </div>
            @error('file_name')
            <span class="text-danger">{{$message}}</span> 
            @enderror  
           <div> <label for="exampleInputFile">File input</label></div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file">
                    <label class="custom-file-label" for="file">Choose file</label>
                  
                </div>
             
            </div>
            @error('file')
            <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        

   
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-9 m-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">GOOGLE DRIVE DATA</h3>

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
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>#</th>
              <th>NAME</th>
              <th>DATE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($files as $file)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$file->file_name}}</td>
              <td>{{$file->created_at}}</td>
              <td><div class="d-flex">
                <a href="/files/{{$file->id}}" class="btn btn-success sm mr-1">Download</a>
                <form action="{{ route('files.destroy', $file->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this file?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
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
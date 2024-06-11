@extends('layouts.admin')

@section('main')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Website</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{route('admin.site.setting.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Website Name</label>
              <input type="text" name="website_name" class="form-control" placeholder="Enter ..." value="{{$setting->website_name ?? ''}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Website URL</label>
              <input type="text" name="website_url" class="form-control" placeholder="Enter ..." value="{{$setting->website_url ?? ''}}">
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label>Page Title</label>
                  <input type="text" name="page_title" class="form-control" placeholder="Enter ..." value="{{$setting->page_title ?? ''}}">
                </div>
              </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>Meta Keyword</label>
              <textarea class="form-control" name="meta_keyword" rows="3" placeholder="Enter ..." >{{$setting->meta_keyword ?? ''}}</textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>Meta Description</label>
              <textarea class="form-control" rows="3" name="meta_description" placeholder="Enter ..." >{{$setting->meta_description ?? ''}}</textarea>
            </div>
          </div>
        </div>
      
      
    </div>
    <!-- /.card-body -->
  </div>

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Website Information</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
     
        <div class="row">
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter ..." value="{{$setting->address ?? ''}}">
            </div>
          </div>
         
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter ..." value="{{$setting->email ?? ''}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Phone No</label>
                  <input type="number" name="phone_no" class="form-control" placeholder="Enter ..." value="{{$setting->phone_no ?? ''}}">
                </div>
              </div>
        </div>  
      
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Social Media Links</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Facebook</label>
              <input type="text" name="facebook" class="form-control" placeholder="Enter ..." value="{{$setting->facebook ?? ''}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Twitter</label>
              <input type="text" name="twitter" class="form-control" placeholder="Enter ..." value="{{$setting->twitter ?? ''}}">
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label>LinkedIn</label>
                  <input type="text" name="linkedin" class="form-control" placeholder="Enter ..." value="{{$setting->linkedin ?? ''}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" name="instagram" class="form-control" placeholder="Enter ..." value="{{$setting->instagram ?? ''}}">
                </div>
              </div>
        </div>  
        <button type="submit" class="btn btn-primary">Save Setting</button>
      </form>

    </div>
    <!-- /.card-body -->
  </div>

@endsection
@extends('layouts.admin')

@section('main')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SMTP Setting</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{route('admin.smtp.setting.update')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Website Name<span style="color: red">*</span></label>
              <input type="text" name="name" class="form-control" placeholder="Enter ..." value="{{$getRecord->name}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Mail Mailer<span style="color: red">*</span></label>
              <input type="text" name="mail_mailer" class="form-control" placeholder="Enter ..." value="{{$getRecord->mail_mailer}}">
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label>Mail Host<span style="color: red">*</span></label>
                  <input type="text" name="mail_host" class="form-control" placeholder="Enter ..." value="{{$getRecord->mail_host}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Mail Port<span style="color: red">*</span></label>
                  <input type="text" name="mail_port" class="form-control" placeholder="Enter ..." value="{{$getRecord->mail_port}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>User Name<span style="color: red">*</span></label>
                  <input type="text" name="mail_userName" class="form-control" placeholder="Enter ..." value="{{$getRecord->mail_userName}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Password<span style="color: red">*</span></label>
                  <input type="text" name="mail_password" class="form-control" placeholder="Enter ..." value="{{$getRecord->mail_password}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Mail Encryption<span style="color: red">*</span></label>
                  <input type="text" name="mail_encryption" class="form-control" placeholder="Enter ..." value="{{$getRecord->mail_encryption}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Mail From <span style="color: red">*</span></label>
                  <input type="text" name="mail_from_address" class="form-control" placeholder="Enter ..." value="{{$getRecord->mail_from_address}}">
                </div>
              </div>
        </div>  
        <button type="submit" class="btn btn-primary">Save</button>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
@endsection
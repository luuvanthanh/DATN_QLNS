@extends('layouts.master')
@section('title', 'profile')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2 class="m-0 text-dark">Quản lý nhân viên</h2>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh sách</li>
        </ol>
      </div>
    </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Change password</div>

              <div class="panel-body">
                  @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                      @if (session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif
                  <form class="form-horizontal" method="POST" action="{{ route('admin.changePassword')}}">
                     @csrf
                      <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                          <label for="new-password" class="col-md-4 control-label">Current Password</label>

                          <div class="col-md-6">
                              <input id="current-password" type="password" class="form-control" name="current_password" required>

                              @if ($errors->has('current_password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('current_password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                          <label for="new-password" class="col-md-4 control-label">New Password</label>

                          <div class="col-md-6">
                              <input id="new-password" type="password" class="form-control" name="new_password" required>

                              @if ($errors->has('new_password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('new_password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                          <div class="col-md-6">
                              <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Change Password
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
</section>
@endsection

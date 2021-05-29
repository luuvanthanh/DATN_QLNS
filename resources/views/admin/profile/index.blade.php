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
        <div class="card col-sm-8">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#profile"
                    data-toggle="tab">Thông tin cá nhân</a></li>
                <li class="nav-item"><a class="nav-link" href="#password"
                    data-toggle="tab">Đổi mật khẩu</a></li>
              </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
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
                    <form method="POST" action="{{ route('admin.updateProfile')}}" accept-charset="UTF-8" id="update-profile">
                        @csrf
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 required">Họ và tên</label>
                          <div class="col-sm-9">
                            <input class="form-control" name="name" type="text" value="{{ $user->name}}" id="name" required>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-3 required">Địa chỉ email</label>
                          <div class="col-sm-9">
                            <input class="form-control" name="email" type="text" value="{{ $user->email}}" id="email" required >
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-9">
                            <input class="btn btn-primary" type="submit" value="Lưu">
                          </div>
                        </div>
                        </form>
                  </div>
                  {{--  --}}
                  <div class="tab-pane" id="password">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            {{-- <div class="panel-heading">Change password</div> --}}
              
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
                                        <label for="new-password" class="col-md-4 control-label">Mật khẩu hiện tại</label>
              
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
                                        <label for="new-password" class="col-md-4 control-label">Mật khẩu mới</label>
              
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
                                        <label for="new-password-confirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>
              
                                        <div class="col-md-6">
                                            <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                                        </div>
                                    </div>
              
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Lưu
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        {{--  --}}
        {{-- <div class="col-md-8 col-md-offset-2">
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
                          <label for="new-password" class="col-md-4 control-label">Mật khẩu hiện tại</label>

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
                          <label for="new-password" class="col-md-4 control-label">Mật khẩu mới</label>

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
                          <label for="new-password-confirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>

                          <div class="col-md-6">
                              <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Lưu
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div> --}}
</section>
@endsection

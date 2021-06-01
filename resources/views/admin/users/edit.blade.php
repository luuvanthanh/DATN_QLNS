@extends('layouts.master')
@section('title','Edit User')
@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    {{-- <link rel="stylesheet" type="text/css" href="/css/categories/category-edit.css"> --}}
@section('content')
    {{-- ------nav--- --}}
    {{-- <div class="card ">
        <nav class=" navbar navbar-expand navbar-white navbar-light" style="border-radius: 10px;">
          <ul class=" navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <button class="btn nav-link" data-toggle="dropdown">
                <i class="fas fa-cog"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a href= class="dropdown-item">
                  <i class="fas fa-user mr-2"></i> Thông tin cá nhân
                </a>
                <div class="dropdown-divider"></div>
                <a href= class="dropdown-item">
                  <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                </a>
              </div>
            </li>
          </ul>
        </nav>
    </div> --}}
    {{-- ------end nav-------- --}}
    <div class="row mb-2">
        <div class="col-sm-6">
        <h2 class="m-0 text-dark">Quản lý người dùng</h2>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item "><a href="{{ route('admin.user.index')}}">Danh sách</a></li>
            <li class="breadcrumb-item active">Chỉnh sửa</li>
        </ol>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cập nhật người dùng</h3>
            </div>
            <div class="card-body">
                <form class="f1" action="{{ route('admin.user.update',$user->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group form-group2">
                        <div class="form-group mb-3">
                            <label for="">Họ và tên:</label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control ip-1" id="" placeholder="">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Địa chỉ email:</label>
                                <input type="text" value="{{$user->email}}" name="email" class="form-control ip-1" id="" placeholder="">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="">Mật khẩu:</label>
                                <input type="text" value="{{$user->password}}" name="password" class="form-control ip-1" id="" placeholder="">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Avatar</label>
                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" class="img-fluid">
                            <input type="file" name="avatar" class="form-control">
                            @error('avatar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-5">
                            <label for="">Vai trò: </label>
                            <select name="role_id" class="form-control">
                                @if(!empty($roles))
                                    @foreach ($roles as $roleId => $roleName)
                                        <option value="{{ $roleId }}" {{ old('role_id', $user->role_id) == $roleId ? 'selected' : ''  }}>{{ $roleName }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Kích hoạt :</label>
                            <select class="form-select" aria-label="Default select example" name="status" id="">
                                @if ($user->status == 1)
                                    <option value="1" selected>có</option>
                                    <option value="2">không</option>
                                @else
                                    <option value="1">có</option>
                                    <option value="2" selected>không</option>
                                @endif
                            </select>
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="form-group">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Quay lại</a>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
      </div>
@endsection
@extends('layouts.master')
@section('title','Edit Role')


@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/roles/role-edit.css">

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
        <h2 class="m-0 text-dark">Quản lý phân quyền</h2>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item "><a href="{{ route('admin.role.index')}}">Danh sách</a></li>
            <li class="breadcrumb-item active">Chỉnh sửa</li>
        </ol>
        </div>
    </div>
    <div class="">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cập nhật vai trò người dùng</h3>
            </div>
            <div class="card-body">
                <form class="f1" action="{{ route('admin.role.update',$roles->id)}}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group form-group2">

                        <div class="form-group mb-5">
                            <label for="">Vai trò:</label>
                            <input type="text" value="{{$roles->name}}" name="name" class="form-control ip-1" >
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- @foreach ($permissions as $key => $permission)
                        <div class="form-check">
                            <input 
                                {{ $getAllPermissionOfRole->contains($permission->id) ? 'checked' : ''}}
                                class="form-check-input" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                            <label class="form-check-label" >{{ $permission->display_name}}</label>
                        </div>
                        @endforeach --}}
                        <div class="form-group mb-5">
                            <label for="">Phân quyền người dùng:</label>
                            <table class="table table-bordered table-hover table-striped" >
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên quyền</th>
                                        <th class="text-center">{{$roles->name}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($permissions))
                                        @foreach ($permissions as $key => $permission)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td class="text-left">{{ $permission->display_name}}</td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input {{ $getAllPermissionOfRole->contains($permission->id) ? 'checked' : ''}}
                                                    class="form-check-input" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="form-group mt-5">
                            <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Quay lại</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div> 
                </form>
            </div>
        </div>
    </div>
@endsection
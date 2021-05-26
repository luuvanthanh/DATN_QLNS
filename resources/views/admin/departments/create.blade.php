@extends('layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-12">
         {{-- nav --}}
      <div class="card ">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
      </div>
        {{--  --}}
        {{--  --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h2 class="m-0 text-dark">Quản lý phòng ban</h2>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
                <li class="breadcrumb-item "><a href="{{ route('admin.departments.index')}}">Danh sách</a></li>
                <li class="breadcrumb-item active">Thêm mới</li>
              </ol>
            </div>
          </div>
        {{--  --}}
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thêm mới phòng ban</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
                <form action="{{ route('admin.departments.store')}}" method="post">
                    @csrf
                    <div class="form-group"	>
                        <label for="name" class="required">Tên phòng ban</label>
                        <input class="form-control" name="name" type="text" value="" id="name">
                        <input class="form-control" name="slug" type="hidden" value="">
                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Lưu">
                        <a href="{{ route('admin.departments.index')}}" class="btn btn-secondary">Quay lại</a>
                      </div>
                </form>   
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
{{-- @include('admin.shared._notify') --}}
@endsection



<div class="col-md-9">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới phòng ban</h3>
    </div>
    <div class="card-body">
      
    </div>
  </div>
</div>
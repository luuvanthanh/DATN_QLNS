@extends('layouts.master')
@section('title', 'list workers')

@section('content')
<section class="content">
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
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark">Quản lý nhân viên</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="{{ route( 'admin.workers.index') }}">Danh sách</a></li>
            <li class="breadcrumb-item active">Chi tiết</li>
          </ol>
        </div>
      </div>
        <div class="">
            <div class="row">
                {{--  --}}
            @if(!empty($workers))
            @foreach ($workers as $key => $worker)
                <div class="col-md-4">
                <div class="card card-primary">
                <div class="card-header border-bottom-0">
                    Nhân sự
                </div>
                <div class="card-body pt-3">
                <div class="row">
                  <div class="col-12">
                    <p class="text-muted mb-3">Mã NV: {{$worker->code}}</p>
                    <h2 class="lead"><b>{{$worker->name}}</b></h2>
                    <p class="text-muted text-md">{{$worker->department->name}}</p>
                    <ul class="ml-4 mb-0 fa-ul text-muted worker-info">
                      <li>
                        <span class="fa-li"><i class="fas fa-lg fa-envelope"></i></i></span>
                        Email: {{$worker->email}}
                      </li>
                      <li>
                        <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                        Số điện thoại: {{$worker->phone}}
                      </li>
                      <li>
                        <span class="fa-li"><i class="fas fa-lg fa-play"></i></span>
                        Trạng thái: {{$worker->status}}
                      </li>
                      <li>
                        <span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span>
                        Ngày vào làm: {{$worker->day_work}}
                      </li>
                    </ul>
                </div>
                </div>
                </div>
                </div>
            @endforeach
            @endif
                {{--  --}}
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

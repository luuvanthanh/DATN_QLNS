@extends('layouts.master')
@section('title', 'list department')

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
          <h2 class="m-0 text-dark">Quản lý phòng ban</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
          </ol>
        </div>
      </div>
        <div class="card">
          <h5 class="m-0 text-dark">Danh sách phòng ban</h5>
          <div class="card-header">
            <span class="float-right">
              <a href="{{ route('admin.departments.create')}}" class=" btn btn-primary">
                <i class="fa fa-plus"></i> Thêm mới
              </a>
            </span>
        </div>
        {{--  --}}
        <div class="card-header row">
        <form class="row g-3" method="GET">
          <div class="col-auto">
            <label class="form-control-plaintext">Tìm kiếm</label>
          </div>
          <div class="col-auto">
            <input type="text" name="name" class="form-control"  placeholder="">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-search"></i> </button>
          </div>
        </form>
      </div>
        {{--  --}}
        <div class="card-body">
          <table class="table table-bordered table-striped data-table">
            <thead>
              <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Tên phòng ban</th>
                <th class="text-center">Số lượng người lao động</th>
                <th class="text-center">Xử lý</th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($departments))
                @foreach ($departments as $key => $department)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $department->name}}</td>
                        <td class="text-center">{{$department->workers_count}}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.departments.destroy', $department->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm float-sm-right">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                            <a class="btn btn-info btn-sm float-sm-right " href="{{ route('admin.departments.edit', $department->id)}}">
                              <i class="fas fa-pencil-alt" ></i>
                            </a>
                          </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

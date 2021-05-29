

@extends('layouts.master')
@section('title','List User') <!-- sử dụng cái title đã khai báo ở master -->
<!-- import file css(private) -->
@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/users/user-list.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" /> 
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@push('js')
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
                <li class="breadcrumb-item active">Danh sách</li>
              </ol>
            </div>
          </div>
            <div class="card">
              <h5 class="text-center mt-2 text-dark">Danh sách người dùng</h5>
              <div class="card-header">
                {{-- show message --}}
        @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
        @endif

        {{-- show error message --}}
        @if(Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
        @endif
                <span class="float-right">
                  <a href="{{ route('admin.user.create')}}" class=" btn btn-primary">
                    <i class="fa fa-plus"></i> Thêm mới
                  </a>
                </span>
            </div>

        <div class="card-body">
            <table class="table table-bordered table-hover table-striped" >
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Họ và tên</th>
                        <th class="text-center">Địa chỉ email</th>
                        <th class="text-center">Avatar</th>
                        <th class="text-center">Vai trò</th>
                        <th class="text-center">Trạng thái</th>
                        <th colspan="2" class="text-center">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($users))
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <img src="{{ asset($user->avatar) }}" alt="{{ $user->avatar }}" class="img-fluid" style="width: 40px; height: auto;">
                            </td>
                            <td>{{ $user->Role->name}}</td>
                            <td class="text-center">
                                @if (($user->status) == 1)
                                    <p class="active">kích hoạt</p>
                                @else
                                    <p class="unactive">chưa kích hoạt</p>
                                @endif
                            </td>
                            <td class="text-center" ><a href="{{(route('admin.user.edit', $user->id))}}" title=""><i class="fas fa-edit"></i></a></td>
                            <td>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  name="submit" value="Delete" onclick="return confirm('bạn có chắc muốn xóa không')"><i class="fas fa-trash-alt float-right i1"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
@endsection






@extends('layouts.master')
@section('title','List Role') <!-- sử dụng cái title đã khai báo ở master -->
<!-- import file css(private) -->
@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/roles/role-list.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" /> 
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@section('content')
        {{-- show message --}}
        @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
        @endif

        {{-- show error message --}}
        @if(Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
        @endif

        <div class="row mb-2">
            <div class="col-sm-6">
              <h2 class="m-0 text-dark">Quản lý phân quyền</h2>  
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách</li>
              </ol>
            </div>
          </div>
            <div class="card">
              <h5 class="text-center mt-2 text-dark">Danh sách vai trò người dùng</h5>
              <div class="card-header">
                <span class="float-right">
                  <a href="{{ route('admin.role.create')}}" class=" btn btn-primary">
                    <i class="fa fa-plus"></i> Thêm mới
                  </a>
                </span>
            </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped" >
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Vai trò người dùng</th>
                        <th class="text-center">Số lượng người dùng</th>
                        <th colspan="2" class="text-center">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($roles))
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td class="text-center">{{ $role->name}}</td>
                            <td class="text-center">{{$role->users_count}}</td>
                            <td class="text-center" ><a href="{{(route('admin.role.edit', $role->id))}}" title=""><i class="fas fa-edit"></i></a></td>
                            <td class="text-center" >
                                <form action="{{ route('admin.role.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  name="submit" value="Delete">
                                        <i class="fas fa-trash-alt float-right i1"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
@endsection



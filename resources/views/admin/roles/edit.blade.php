@extends('layouts.master')
@section('title','Edit Role')


@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/roles/role-edit.css">

@section('content')
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
	{{-- -------------------hiển thị thông báo lỗi------------------------ --}}
	@if($errors->any())
        <?php echo implode('', $errors->all('<div>:message</div>')); ?>
    @endif
	{{-- -------------------------------------------- --}}
    <div class="col-md-9">
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
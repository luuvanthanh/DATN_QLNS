@extends('layouts.master')
@section('title','Edit User')
@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    {{-- <link rel="stylesheet" type="text/css" href="/css/categories/category-edit.css"> --}}
@section('content')
	{{-- -------------------hiển thị thông báo lỗi------------------------ --}}
	@if($errors->any())
        <?php echo implode('', $errors->all('<div>:message</div>')); ?>
    @endif
	{{-- -------------------------------------------- --}}
	<form class="f1" action="{{ route('admin.user.update',$user->id)}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2 class="text-center pt-5">Cập nhật người dùng</h2>

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
                <div class="form-group col-md-6">
                    <label for="">Mật khẩu:</label>
                    <input type="text" value="{{$user->password}}" name="password" class="form-control ip-1" id="" placeholder="">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
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
                <input type="text" value="{{$user->status}}" name="status" class="form-control" id="" placeholder="">
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
@endsection
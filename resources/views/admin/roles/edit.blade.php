@extends('layouts.master')
@section('title','Edit Role')


@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/roles/roles-edit.css">

@section('content')
	{{-- -------------------hiển thị thông báo lỗi------------------------ --}}
	@if($errors->any())
        <?php echo implode('', $errors->all('<div>:message</div>')); ?>
    @endif
	{{-- -------------------------------------------- --}}
	<form class="f1" action="{{ route('admin.role.update',$roles->id)}}" method="POST" role="form">
        @csrf
        @method('PUT')
        <h2 class="text-center pt-5 mb-3">Chỉnh sửa vai trò</h2>

        <div class="form-group form-group2">

            <div class="form-group mb-5">
                <label for="">Vai trò:</label>
                <input type="text" value="{{$roles->name}}" name="name" class="form-control ip-1" >
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            @foreach ($permissions as $key => $permission)
            <div class="form-check">
                <input 
                    {{ $getAllPermissionOfRole->contains($permission->id) ? 'checked' : ''}}
                    class="form-check-input" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                <label class="form-check-label" >{{ $permission->display_name}}</label>
            </div>
            @endforeach
            
            <div class="form-group mt-5">
                <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Quay lại</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </div> 
	</form>
@endsection


@extends('layouts.master')
@section('title','Create Role') <!-- sử dụng cái title đã khai báo ở master -->
<!-- import file css(private) -->
@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/roles/role-create.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" /> 
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@section('content')
<div class="container">
	<form action="{{ route('admin.role.store')}}" method="POST" role="">
        @csrf
        <h2 class="text-center pt-5 mb-3">Thêm mới vai trò</h2>
        
        <div class="form-group mb-5">
            <label for="">Vai trò:</label>
            <input type="text" name="name" class="form-control " id="" placeholder="">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-5">
            <label for="">Phân quyền người dùng:</label>
            <table class="table table-bordered table-hover table-striped" >
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên quyền</th>
                        <th class="text-center">Xử lí</th>
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
                                    <input class="form-check-input" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>


        <div class="form-group">
            <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>

    </form>
</div>
@endsection



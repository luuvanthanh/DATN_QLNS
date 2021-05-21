

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
            @foreach ($permissions as $key => $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                <label class="form-check-label" >{{ $permission->display_name}}</label>
            </div>
            @endforeach
        </div>
        

        <div class="form-group mt-5">
            <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>

    </form>
</div>
@endsection



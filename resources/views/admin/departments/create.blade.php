@extends('layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-12">
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
                        <input class="form-control" name="name" type="text" value="{{old('name')}}" id="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
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
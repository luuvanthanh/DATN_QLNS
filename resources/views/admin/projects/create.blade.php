@extends('layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="row mb-2">
              <div class="col-sm-6">
                <h2 class="m-0 text-dark">Quản lý nhân sự</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
                  <li class="breadcrumb-item "><a href="{{ route('admin.project.index')}}">Danh sách</a></li>
                  <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
              </div>
            </div>
          {{--  --}}
           <div class="col-md-9">
             <div class="card">
                {{--  --}}
                {{--  --}}
              <form action="{{ route('admin.project.store')}}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="info">
                      <div class="form-group">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group"	>
                                  <label for="name" class="required">Tên dự án</label>
                                  <input class="form-control" name="name" type="text" value="{{ old('name')}}" id="name">
                                  @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                  <label for="name" class="required">Số nhân viên</label>
                                  <input class="form-control" name="number" type="text" value="{{ old('number')}}" id="name">
                                  @error('number')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                  <label for="name" class="required">Ngày băt đầu</label>
                                  <input class="form-control" name="start_day" type="date" value="{{ old('start_day')}}" id="name">
                                  <label for="name" class="required">Ngày kết thúc dự kiến</label>
                                  <input class="form-control" name="expected_end_day" type="date" value="{{ old('expected_end_day')}}" id="name">
                                  <label for="name" class="required">Ngày kết thúc thực tế</label>
                                  <input class="form-control" name="actual_end_day" type="date" value="{{ old('actual_end_day')}}" id="name">
                                  <label for="name" class="required">Trạng thái</label>
                                  <input class="form-control" name="status" type="text" value="{{ old('status')}}" id="name">
                                  
                                </div>
                              </div>
                              <div class="card-footer">
                                  <input class="btn btn-primary" type="submit" value="Lưu">
                                  <a href="{{ route('admin.workers.index')}}" class="btn btn-secondary">Quay lại</a>
                              </div>
                            </div>
                           
                    </div>
                  </div>
              </form>
              </div>
          </div> 
      </div>
    </div>
  </div>
</section>
@endsection
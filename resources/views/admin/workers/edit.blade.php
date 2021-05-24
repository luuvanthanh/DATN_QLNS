@extends('layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
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
        {{--  --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h2 class="m-0 text-dark">Quản lý nhân viên</h2>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
                <li class="breadcrumb-item "><a href="{{ route('admin.workers.index')}}">Danh sách</a></li>
                <li class="breadcrumb-item active">Thêm mới</li>
              </ol>
            </div>
          </div>
        {{--  --}}
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thêm mới nhân viên</h3>
          </div>
          <div class="card-body">
            {{--  --}}
            {{-- <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="active nav-link" href="#info" data-toggle="tab">Thông tin</a></li>
                <li class="nav-item"><a class="nav-link" href="/view/admin/workers/education.blade.php" data-toggle="tab">Trình độ</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#record" data-toggle="tab">Hồ sơ</a></li> --}}
              </ul>
            </div>
            {{--  --}}
            <div class="form-group">
                <form action="{{ route('admin.workers.update', $workers->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group"	>
                          <label for="name" class="required">Mã nhân viên</label>
                          <input class="form-control" name="code" type="text" value="{{$workers->code}}" id="name">
                          <label for="name" class="required">Họ và tên</label>
                          <input class="form-control" name="name" type="text" value="{{$workers->name}}" id="name">
                          <label for="name" class="required">Số CMND</label>
                          <input class="form-control" name="cmnd_no" type="text" value="{{$workers->cmnd_no}}" id="name">
                          <label for="name" class="required">Ngày cấp</label>
                          <input class="form-control" name="day_range" type="date" value="{{$workers->day_range}}" id="name">
                          <label for="name" class="required">Nơi cấp</label>
                          <input class="form-control" name="issued_by" type="text" value="{{$workers->issued_by}}" id="name">
                          <label for="name" class="required">Địa chỉ</label>
                          <input class="form-control" name="address" type="text" value="{{$workers->address}}" id="name">

                          <label for="name" class="required">Trình độ</label>
                          <select class="form-control" id="education_id" name="level">
                            <option value="1">Trung học</option>
                            <option value="2">Trung cấp</option>
                            <option value="3">Cao đẳng</option>
                            <option value="4">Đại học</option>
                            <option value="5">Trên đại học</option>
                            <option value="0" selected="selected">--Chọn trình độ--</option>
                          </select>
                          <label for="name" class="required">Trường tốt nghiệp</label>
                          <input class="form-control" name="school" type="text" value="{{$workers->school}}" id="name">
                          <label for="name" class="required">Bằng cấp, chứng chỉ</label>
                          <input class="form-control" name="certificate" type="text" value="{{$workers->certificate}}" id="name">
                          
                      </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group"	>
                          <label for="name" class="required">Giới tính</label>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="custom-control custom-radio col-sm-4 pl-5 mb-2 pt-1">
                                <input class="custom-control-input" id="male" checked="checked" name="sex" type="radio" value="0">
                                <label for="male" class="custom-control-label">Nam</label>
                              </div>
                            </div>
                            <div class="col-sm-6 ">
                              <div class="custom-control custom-radio col-sm-4 pl-5 mb-2 pt-1">
                                <input class="custom-control-input" id="female"  name="sex" type="radio" value="1">
                                <label for="female" class="custom-control-label">Nữ</label>
                              </div>
                            </div>
                          </div>
                          <label for="name" class="required">Số điện thoại</label>
                          <input class="form-control" name="phone" type="text" value="{{$workers->phone}}" id="name">
                          <label for="name" class="required">Email</label>
                          <input class="form-control" name="email" type="text" value="{{$workers->email}}" id="name">
                          <label for="name" class="required">Ngày vào làm</label>
                          <input class="form-control" name="day_work" type="date" value="{{$workers->day_work}}" id="name">
                          <label for="name" class="required">Trạng thái</label>
                          <select class="form-control" id="status" name="status">
                            <option value="-1">Nghỉ việc</option>
                            <option value="0" selected="selected">Thử việc</option>
                            <option value="1">Chính thức</option>
                          </select>

                          <label for="name" class="required">Kỹ nẵng chuyên môn</label>
                          <input class="form-control" name="skill" type="text" value="{{$workers->skill}}" id="name">
                          <label for="name" class="required">Phòng ban</label>
                          <select class="form-control" id="education_id" name="department_id">
                            <option value=""></option>
                            @if ($departments)
                              @foreach ($departments as $departmentID => $departmentName)
                                {{-- chu y $workers->department_id --}}
                                <option value="{{ $departmentID}}" {{  $workers->department_id == $departmentID ? 'selected' : '' }}  >{{ $departmentName}}</option>
                              @endforeach  
                            @endif
                          </select>
                          <label for="name" class="required">Chức vụ</label>
                          <select class="form-control" id="education_id" name="position_id">
                            <option value=""></option>
                            @if ($departments)
                              @foreach ($positions as $positionID => $positionName)
                                {{-- chu y $workers->department_id --}}
                                <option value="{{ $positionID}}" {{  $workers->position_id == $positionID ? 'selected' : '' }}  >{{ $positionName}}</option>
                              @endforeach  
                            @endif
                          </select>
                          {{-- <input class="form-control" name="position_id" type="text" value="{{!empty($workers->position->name)?$workers->position->name: null}}" id="name"> --}}
                      </div>
                      </div>
                      
                      <div class="card-footer">
                          <input class="btn btn-primary" type="submit" value="Lưu">
                          <a href="{{ route('admin.workers.index')}}" class="btn btn-secondary">Quay lại</a>
                        </div>
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
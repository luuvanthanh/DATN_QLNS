@extends('layouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-12">
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
    </div>
        {{--  --}}
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="active nav-link" href="#info" data-toggle="tab">Thông tin</a></li>
              <li class="nav-item"><a class="nav-link" href="#record" data-toggle="tab">Hồ sơ</a></li>
            </ul>
          </div>
          <form action="{{ route('admin.workers.update', $workers->id)}}" method="post">
            @csrf
            @method('PUT')
          <div class="card-body">
            {{--  --}}
            <div class="form-group">
                
              <div class="tab-content">
                <div class="active tab-pane" id="info">
                  <div class="form-group">

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
                          <input class="form-control" name="day_range" type="date" value="{{$workers->day_range}}" id="datepicker">
                          <label for="name" class="required">Nơi cấp</label>
                          <input class="form-control" name="issued_by" type="text" value="{{$workers->issued_by}}" id="name">
                          <label for="name" class="required">Địa chỉ</label>
                          <input class="form-control" name="address" type="text" value="{{$workers->address}}" id="name">

                          <label for="name" class="required">Trình độ</label>
                          <input class="form-control" name="level" type="text" value="{{$workers->level}}" id="name">
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
                                <input class="custom-control-input" id="male"  name="sex" checked  type="radio" value="0" {{$workers->sex == 0 ? 'checked' : ''}}>
                                <label for="male" class="custom-control-label">Nam</label>
                              </div>
                            </div>
                            <div class="col-sm-6 ">
                              <div class="custom-control custom-radio col-sm-4 pl-5 mb-2 pt-1">
                                <input class="custom-control-input" id="female"  name="sex" type="radio" value="1" {{$workers->sex == 1 ? 'checked' : ''}}>
                                <label for="female" class="custom-control-label">Nữ</label>
                              </div>
                            </div>
                          </div>
                          <label for="name" class="required">Số điện thoại</label>
                          <input class="form-control" name="phone" type="text" value="{{$workers->phone}}" id="name">
                          <label for="name" class="required">Email</label>
                          <input class="form-control" name="email" type="text" value="{{$workers->email}}" id="name">
                          <label for="name" class="required">Ngày vào làm</label>
                          <input class="form-control" name="day_work" type="date" value="{{ $workers->day_work}}" id="datepicker">
                          <label for="name" class="required">Trạng thái</label>
                          <select class="form-control" id="status" name="status">
                            <option value="-1" {{$workers->status == -1 ? 'selected' : ''}} >Nghỉ việc</option>
                            <option value="0" {{$workers->status == 0 ? 'selected' : ''}}>Thử việc</option>
                            <option value="1" {{$workers->status == 1 ? 'selected' : ''}}>Chính thức</option>
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
                            @if ($positions)
                              @foreach ($positions as $positionID => $positionName)
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
                  </div>
                </div>
                <div class="tab-pane" id="record">
                      
                  <div class="form-group clearfix row pl-4 pt-2">
                      @if (!empty($records))
                      @foreach ($records as $kRecord => $record)
                      <div class="d-inline col-md-4">
                        @php
                          $recordOld = [];
                          if (!empty(old('record'))) {
                            $recordOld = old('record');
                          }
                        @endphp
                        <input class="form-check-input" name="record[]" {{ in_array($record->id, $recordOld) ? 'checked' : '' }}   type="checkbox" value="{{$record->id }}" {{ $getAllRecordWorker->contains($record->id) ? 'checked' : ''}}  id="flexCheckDefault-{{ $kRecord }}">
                        <label class="form-check-label" for="flexCheckDefault-{{ $kRecord }}">{{$record->name}}</label>
                      </div>
                      @endforeach
                      @endif
                    
                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Lưu">
                        <a href="{{ route('admin.workers.index')}}" class="btn btn-secondary">Quay lại</a>
                    </div>
                  
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
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
@endsection

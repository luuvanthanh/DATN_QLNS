@extends('layouts.master')
@section('title', 'list workers')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark">Quản lý nhân viên</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="{{ route( 'admin.workers.index') }}">Danh sách</a></li>
            <li class="breadcrumb-item active">Chi tiết</li>
          </ol>
        </div>
      </div>
        <div class="">
            <div class="row">
                {{--  --}}
            @if(!empty($workers))
            @foreach ($workers as $key => $worker)
              <div class="col-md-4">
                <div class="card card-primary">
                <div class="card-header border-bottom-0">
                    Nhân sự
                </div>
                <div class="card-body pt-3">
                <div class="row">
                  <div class="col-12">
                    <p class="text-muted mb-3">Mã NV: {{$worker->code}}</p>
                    <h2 class="lead"><b>{{$worker->name}}</b></h2>
                    <p class="text-muted text-md">{{$worker->department->name}}</p>
                    <ul class="ml-4 mb-0 fa-ul text-muted worker-info">
                      <li>
                        <span class="fa-li"><i class="fas fa-lg fa-envelope"></i></i></span>
                        Email: {{$worker->email}}
                      </li>
                      <li>
                        <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                        Số điện thoại: {{$worker->phone}}
                      </li>
                      <li>
                        <span class="fa-li"><i class="fas fa-lg fa-play"></i></span>
                        Trạng thái:  
                        @if ($worker->status == -1)
                        <span for=""  >Nghỉ việc</span>
                        @elseif($worker->status == 0)
                        <span for="" >Thử việc</span>
                        @elseif($worker->status == 1)
                        <span for="" >Chính thức</span>
                        @endif
                      </li>
                      <li> 
                        <span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span>
                        Ngày vào làm: {{date('d/m/Y', strtotime($worker->day_work))}}
                      </li>
                    </ul>
                </div>
                </div>
                </div>
                </div>
           
            </div>
            <div class="col-md-8"> 
              <div class="card ">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="active nav-link" href="#info" data-toggle="tab">Thông tin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contract" data-toggle="tab">Hợp đồng</a></li>
                   
                  </ul>
                </div>
              <div class="card-body ">
                <div class="tab-content">
                  <div class="active tab-pane" id="info">
                    <div class="row">
                      <div class="col-12">
                        <ul class="ml-4 mb-0 fa-ul text-muted worker-info">
                          <li>
                            <span class="fa-li"><i class="fas fa-lg fa-transgender"></i></span>
                            Giới tính: 
                            @if ($worker->sex == 0)
                            <span for="" >Nam</span>
                            @elseif($worker->sex == 1)
                            <span for="" >Nữ</span>
                            @endif
                          </li>
                          <li>
                            <span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span>
                            Ngày sinh: {{date('d/m/Y', strtotime($worker->birthday))}}
                          </li>
                          <li>
                            <span class="fa-li"><i class="fas fa-md fa-id-card"></i></span>
                            Số CMND: {{ $worker->cmnd_no}}
                          </li>
                          <li>
                            <span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span>
                            Ngày cấp: {{ date('d/m/Y', strtotime($worker->day_range))}}
                          </li>
                          <li>
                            <span class="fa-li"><i class="fas fa-lg fa-paper-plane"></i></span>
                            Nơi cấp: {{ $worker->issued_by}}
                          </li>
                          <li>
                            <span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                            Địa chỉ: {{ $worker->address}}
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <div class="tab-pane" id="contract">
                   
                    <table class="table table-bordered table-striped data-table">
                      @include('admin.contracts.index')
                      {{-- @include('admin.contracts.create')   --}}
                    </table>
                  </div>
                </div>
                
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

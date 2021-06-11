@extends('layouts.master')
@section('title', 'list project')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark">Quản lý dự án</h2>
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
          </ol>
        </div>
      </div>
        <div class="card">
          <h5 class="m-0 text-dark">Danh sách dự án</h5>
          <div class="card-header">
            <span class="float-right">
              <a href="{{ route('admin.project.create')}}" class=" btn btn-primary">
                <i class="fa fa-plus"></i> Thêm mới
              </a>
            </span>
        </div>
        {{--  --}}
        <div class="card-header row">
        <form class="row g-3" method="GET">
          <div class="col-auto">
            <label class="form-control-plaintext">Tìm kiếm</label>
          </div>
          <div class="col-auto">
            <input type="text" name="name" class="form-control" value=""  placeholder="Tên dự án">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-search"></i> </button>
          </div>
        </form>
      </div>
        {{--  --}}
        <div class="card-body">
          <table class="table table-bordered table-striped data-table">
            <thead>
              <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Tên dự án</th>
                <th class="text-center">Số nhân viên</th>
                <th class="text-center">Ngày bắt đầu</th>
                <th class="text-center">Ngày kết thúc (dự kiến)</th>
                <th class="text-center">Ngày kết thúc (thực tế)</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center" colspan="3" >Xử lý</th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($projects))
                @foreach ($projects as $key => $project)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="text-center">{{ $project->name}}</td>
                        <td class="text-center">{{ $project->number_of_member}}</td>
                        <td class="text-center">{{  date('d/m/Y', strtotime($project->start_day)) }}</td>
                        <td class="text-center">{{  date('d/m/Y', strtotime($project->expected_end_day)) }}</td>
                        <td class="text-center">{{  date('d/m/Y', strtotime($project->actual_end_day)) }}</td>
                        <td class="text-center">{{ $project->status}}</td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm  " href="{{ route('admin.project.edit', $project->id)}}">
                              <i class="fas fa-pencil-alt" ></i>
                            </a>
                        </td>
                        <td class="text-center">
                          <form action="{{ route('admin.project.destroy', $project->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                      </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

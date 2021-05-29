@extends('layouts.master')
@section('title', 'list department')

@section('content')
@if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark">Quản lý phòng ban</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route( 'admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
          </ol>
        </div>
      </div>
        <div class="card">
          <h5 class="m-0 text-dark">Danh sách phòng ban</h5>
          <div class="card-header">
            <span class="float-right">
              <a href="{{ route('admin.departments.create')}}" class=" btn btn-primary">
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
            <input type="text" name="name" class="form-control"  placeholder="">
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
                <th class="text-center">Tên phòng ban</th>
                <th class="text-center">Số lượng người lao động</th>
                <th class="text-center" colspan="2" >Xử lý</th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($departments))
                @foreach ($departments as $key => $department)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $department->name}}</td>
                        <td class="text-center">{{$department->workers_count}}</td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm  " href="{{ route('admin.departments.edit', $department->id)}}">
                              <i class="fas fa-pencil-alt" ></i>
                            </a>
                        </td>
                        <td class="text-center">
                          <form action="{{ route('admin.departments.destroy', $department->id)}}" method="POST">
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
{{ $departments->appends(request()->input())->links() }}
@endsection

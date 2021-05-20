@extends('layouts.master')
@section('title', 'list department')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
        <div class="card-body">
          <table class="table table-bordered table-striped data-table">
            <thead>
              <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Tên phòng ban</th>
                <th class="text-center">Số lượng người lao động</th>
                <th class="text-center">Xử lý</th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($departments))
                @foreach ($departments as $key => $department)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $department->name}}</td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href=>
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirm-delete"
                              data-id={{ $department->id }} data-url="">
                              <i class="fas fa-trash"></i>
                            </button>
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

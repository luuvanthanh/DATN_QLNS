@extends('layouts.master')
@section('content')
<section class="content">
  <div class="modal-body" >
    <div class="row">
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="contract_type" class="required">Loại HĐLĐ</label>
                <select class="form-control" name="contract_type_id">
                  <option value="0" selected="selected">--Chọn loại hợp đồng--</option>
                  @if (!empty($contract_types))
                  @foreach ($contract_types as $contract_type)
                  <option value="{{$contract_type->id}}" {{  old('contract_type_id') == $contract_type->id ? 'selected' : '' }}>{{ $contract_type->name}}</option>
                  @endforeach  
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="salary">Mức lương căn bản</label>
                <input class="form-control" name="wage" type="text" value="" id="wage">
              </div>
              <div class="form-group">
                <label for="status">Trạng thái</label>
                <select class="form-control" id="status" name="status">
                  <option value="0" selected="selected">Chưa ký</option>
                  <option value="1">Đã ký</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="effective_date">Ngày hiệu lực</label>
                <input class="form-control reservation" name="effective_date" type="text" value="" id="effective_date">
              </div>
              <div class="form-group">
                <label for="expiry_date">Ngày hết hiệu lực</label>
                <input class="form-control reservation js-clear" name="expiry_date" type="text" value="" id="expiry_date">
              </div>
              <div class="form-group">
                <label for="sign_date">Ngày ký</label>
                <input class="form-control reservation" name="sign_date" type="text" value="" id="sign_date">
              </div>
          </div>
         

          <div class="modal-footer justify-content-between">
            <button class="btn btn-default" data-dismiss="modal" type="button">Đóng</button>
            <input class="btn btn-primary" type="submit" value="Lưu">
          </div>
        </form>
</section>
{{-- @include('admin.shared._notify') --}}
@endsection




<!-- Modal -->
<div class="modal fade" id="modal-edit-contract" tabindex="-1" role="dialog" aria-labelledby="modal-edit-contract-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form id="edit_data_contracts">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-edit-contract-label">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- content edit contract --}}
        <div class="modal-body">
          {{-- <form id="edit_data_contracts" class="toidayaaaaaa khi minh click em dung cái modal bootstrap"> --}}
            @method('PUT')
            @csrf
            <input type="hidden" name="url" id="url">
                <div class="row">
                  <div class="col-sm-6">
                      @if (!empty($workers ))
                      @foreach($workers as $worker)
                        <input type="hidden" name="id_worker" id="id_worker1"  value="{{ $worker->id}}">
                      @endforeach
                      @endif
                        <input type="hidden" name="id" id="id">                       
                        <div class="form-group">
                          <label for="code" class="required">Mã HĐ</label>
                          <input class="form-control" readonly name="code1" type="text" value="" id="code1">
                        </div>
                        <div class="form-group">
                          <label for="contract_type" class="required">Loại HĐLĐ</label>
                          <select class="form-control" name="contract_type_id1" id="contract_type_id1"> 
                            <option value="">--Chọn loại hợp đồng--</option>
                            @if (!empty($contract_types))
                            @foreach ($contract_types as $contract_type)
                            <option value="{{$contract_type->id}}" {{  old('contract_type_id1') == $contract_type->id ? 'selected' : '' }}>{{ $contract_type->name}}</option>
                            @endforeach  
                          @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="salary">Mức lương căn bản</label>
                          <input class="form-control" name="wage1" type="text" value="" id="wage1">
                        </div>
                        <div class="form-group">
                          <label for="status">Trạng thái</label>
                          <select class="form-control" id="status1" name="status1">
                            <option value="0" selected="selected">Chưa ký</option>
                            <option value="1">Đã ký</option>
                          </select>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group">
                          <label for="effective_date">Ngày hiệu lực</label>
                          <input class="form-control reservation" name="effective_date1" type="date" value="" id="effective_date1">
                        </div>
                        <div class="form-group">
                          <label for="expiry_date">Ngày hết hiệu lực</label>
                          <input class="form-control reservation js-clear" name="expiry_date1" type="date" value="" id="expiry_date1">
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close_edit"  data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-edit-contract">Save</button>
                  </div>
                </div>
          {{-- </form> --}}
        </div>
      </div>
    </form>
    </div>
  </div>
 
  
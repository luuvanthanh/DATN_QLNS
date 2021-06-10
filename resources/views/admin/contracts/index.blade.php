
@if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<section class="content">
{{-- add contract --}}
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tạo HĐLĐ
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo HĐ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- content add contract --}}
      <div class="modal-body">
          {{--form Contract  --}}
          <form action="{{ route('admin.contracts.store')}}" method="POST" id="insert_data_contracts">
            @csrf
              <div class="row">
                <div class="col-sm-6">
                    @if (!empty($workers ))
                    @foreach($workers as $worker)
                      <input type="hidden" name="id_worker" id="id_worker"  value="{{ $worker->id}}">
                    @endforeach
                    @endif
                    @php
                      $maHD= 'HD'.date('YmdHis'); 
                    @endphp
                      <div class="form-group">
                        <label for="code" class="required">Mã HĐ</label>
                        <input class="form-control" name="code" readonly type="text" value="{{$maHD}}" id="code">
                      </div>
                      <div class="form-group">
                        <label for="contract_type" class="required">Loại HĐLĐ</label>
                        <select class="form-control" name="contract_type_id" id="contract_type_id"> 
                          <option value="">--Chọn loại hợp đồng--</option>
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
                        <input class="form-control reservation" name="effective_date" type="date" value="" id="effective_date">
                      </div>
                      <div class="form-group">
                        <label for="expiry_date">Ngày hết hiệu lực</label>
                        <input class="form-control reservation js-clear" name="expiry_date" type="date" value="" id="expiry_date">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                  <button type="button" id="insert_contract" class="btn btn-primary">Lưu</button>
                </div>
          </form>
      </div>
      
    </div>
  </div>
</div>
{{-- edit contrats --}}


{{-- include modal edit contract --}}
@include('admin.contracts.modal_edit_contract')

{{-- list contract --}}
@if ($getAllWorkerContract->isNotEmpty())
  <div class="dataTables_scroll">
    <table id="scroll_table" class="table table-bordered table-striped js-contract-table">
        <thead>
          <tr>
              <th class="">STT</th>
              <th class="">Mã HĐ</th>
              <th class="">Loại HĐLĐ</th>
              <th class="">Mức lương</th>
              <th class="">Ngày hiệu lực</th>
              <th class="">Ngày hết hiệu lực</th>
              {{-- <th class="text-center">Ngày ký</th> --}}
              <th class="">Trạng thái</th>
              <th class="" colspan="2">Xử lý</th>
          </tr>
        </thead>
        <tbody>
         
          @if(!empty($contracts))
          @foreach ($contracts as $key => $contract)
            @if ($getAllWorkerContract->contains($contract->id))
              <tr id="sid{{$contract->id}}">
                  <td class="">{{$key+1}}</td>
                  <td class="">{{ $contract->code}}</td>
                  <td class="">{{ !empty($contract->contractType->name) ? $contract->contractType->name : null }}</td>
                  <td class="">{{ $contract->wage}}</td>
                  <td class="">{{ $contract->start_day}}</td>
                  <td class="">{{ $contract->end_day}}</td>
                  <td class="">{{ $contract->status == 1 ? 'Đã ký' : 'Chưa ký'}}</td>
                  <td class="text-center">
                    <a href="#"type="button" class="btn btn-primary" data-toggle="modal"  onclick="editContract({{$contract->id}}, '{{ route('admin.contracts.update', $contract->id)}}')" >Edit</a>
                  </td>
                  <td>
                    <form action="{{ route('admin.contracts.destroy', $contract->id)}}" method="POST" class="frm-contract-delete">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-delete" onclick="return confirm('Are you sure DELETE?')">Delete</button>
                    </form>
                  </td>
              </tr>
            @endif
          @endforeach
          @endif
        </tbody>
    </table>
  </div>
@else
  <div class="alert alert-warning">
    Nhân viên này chưa có hợp đồng
  </div>
@endif
</section>

@push('js')
<script>
  var _csrf = '{{ csrf_token() }}';
  var url_contract_store = '{{ route('admin.contracts.store') }}';
  
</script>

<script src="/adminlte/dist/js/ajax_contract.js"></script>

<script type="text/javascript">
  function editContract(id, url){
      $.get('/contracts/edit/'+id, function(contract){
          // set value for input
          $('#modal-edit-contract').find("#url").val(url);
          $('#modal-edit-contract').find("#id").val(contract.id);
          $('#modal-edit-contract').find("#code1").val(contract.code);
          $('#modal-edit-contract').find("#effective_date1").val(contract.start_day);
          $('#modal-edit-contract').find("#expiry_date1").val(contract.end_day);
          $('#modal-edit-contract').find("#wage1").val(contract.wage);
          $('#modal-edit-contract').find("#status1").val(contract.status);
          $('#modal-edit-contract').find("#contract_type_id1").val(contract.contract_type_id);
         
          // show Modal
          $("#modal-edit-contract").modal('show');
      });
  }
  $("#close_edit").on('click', function(){
    $("#modal-edit-contract").modal('hide');
  });
      
      
      $(document).ready(function () {
        $(document).on('click', '#btn-edit-contract', function () {
          // get data form 
          let url = $('#modal-edit-contract').find('#url').val();
          let id = $('#modal-edit-contract').find("#id").val();
          let code = $('#modal-edit-contract').find("#code1").val();
          let start_day = $('#modal-edit-contract').find("#effective_date1").val();
          let end_day = $('#modal-edit-contract').find("#expiry_date1").val();
          let wage = $('#modal-edit-contract').find("#wage1").val();
          let status = $('#modal-edit-contract').find("#status1").val();
          let contract_type_id = $('#modal-edit-contract').find("#contract_type_id1").val();  
          let _token = $('#modal-edit-contract').find('input[name=_token]').val();

          // send AJAX 
          $.ajax({
            url: url,
            type: "PUT",
            data: {
                    id:id,
                    code:code,
                    start_day:start_day,
                    end_day:end_day,
                    wage:wage,
                    status:status,
                    contract_type_id:contract_type_id,
                    _token: _token,
            },
            success:function(response){
              alert('update thành công');
              $('#sid' + response.id + ' td:nth-child(1)').text(response.code);
              $('#sid' + response.id + ' td:nth-child(2)').text(response.start_day);
              $('#sid' + response.id + ' td:nth-child(3)').text(response.end_day);
              $('#sid' + response.id + ' td:nth-child(4)').text(response.wage);
              $('#sid' + response.id + ' td:nth-child(5)').text(response.status);
              $('#sid' + response.id + ' td:nth-child(6)').text(response.contract_type_id);
              
              // $("#modal-edit-contract").modal('toggle');
              // $("#edit_data_contracts")[0].reset();
            },
            error: function (err) {
              console.log(err)
            }
          });
        });
      });
</script>
@endpush
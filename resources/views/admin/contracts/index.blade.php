
@if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<section class="content">
 
        <div class="card-body">
         {{--  --}}
         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-hd" data-toggle="modal" data-target="#addModal" ">
  <i class="fa fa-plus"></i>Tạo hợp đồng
</button>

<!-- add contracts -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Tạo HĐLĐ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <div class="modal-body">
        {{-- form --}}
        <form action="{{ route('admin.contracts.store')}}" method="POST" id="insert_data_contracts">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              @if (!empty($workers ))
              @foreach($workers as $worker)
              <input type="hidden" name="id_worker" id="id_worker"  value="{{ $worker->id}}">
              @endforeach
              @endif
              <div class="form-group">
                <label for="code" class="required">Mã HĐ</label>
                <input class="form-control" name="code" type="text" value="" id="code">
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
              {{-- <div class="form-group">
                <label for="sign_date">Ngày ký</label>
                <input class="form-control reservation" name="sign_date" type="text" value="" id="sign_date">
              </div> --}}
          </div>
        
        
        {{--  --}}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" id="insert_contract" class="btn btn-primary">Lưu</button>
      </div>
    </div>
  </form>
  </div>
</div>


{{-- delete contract --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
  <form action="" method="POST" id="deleteFormId">
  @csrf
        <div class="modal-body"> 
          @csrf
          @method('DELETE')
          <input type="hidden" name="id" id="delete_id" value="">
         
          <p>Bạn có chắc chắn muốn xóa dữ liệu</p>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" id="insert_contract" class="btn btn-primary">Lưu</button>
      </div>
  </form>
  @include('admin.contracts._table_contract')
</td>
                    </tr>
                {{-- @endforeach
                @endif --}}
            </tbody>
          </table>
        </div>
      
</section>



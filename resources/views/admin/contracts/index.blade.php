

@if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<section class="content">
 
        <div class="card-body">
          <div >
            <span >
              <a href="{{ route('admin.contracts.create')}}"  class=" btn btn-primary">
                <i class="fa fa-plus"></i> Tạo HĐLĐ
              </a>
            </span>
          </div>
          <table class="table table-bordered table-striped data-table">
            <thead>
              <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Mã HĐ</th>
                <th class="text-center">Loại HĐLĐ</th>
                <th class="text-center">Ngày hiệu lực</th>
                <th class="text-center">Ngày hết hiệu lực</th>
                <th class="text-center" colspan="2" >Xử lý</th>
              </tr>
            </thead>
            <tbody>
                {{-- @if(!empty($departments))
                @foreach ($departments as $key => $department) --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm  " href="">
                              <i class="fas fa-pencil-alt" ></i>
                            </a>
                        </td>
                        <td class="text-center">
                          <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger btn-sm">
                              <i class="fas fa-trash" ></i>
                            </button>
                          </form>
                      </td>
                    </tr>
                {{-- @endforeach
                @endif --}}
            </tbody>
          </table>
        </div>
      
</section>


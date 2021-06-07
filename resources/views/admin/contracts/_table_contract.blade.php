
@if ($contracts->isNotEmpty())
    <div class="dataTables_scroll">
    <table class="table table-bordered table-striped js-contract-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Mã HĐ</th>
            <th class="text-center">Loại HĐLĐ</th>
            <th class="text-center">Mức lương</th>
            <th class="text-center">Ngày hiệu lực</th>
            <th class="text-center">Ngày hết hiệu lực</th>
            {{-- <th class="text-center">Ngày ký</th> --}}
            <th class="text-center">Trạng thái</th>
            <th class="text-center" colspan="3">Xử lý</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($contracts))
        @foreach ($contracts as $key => $contract)
        <tr>
            <td class="text-center">{{$key+1}}</td>
            <td class="text-center">{{ $contract->code}}</td>
            <td class="text-center">{{ !empty($contract->contractType->name) ? $contract->contractType->name : null }}</td>
            <td class="text-center">{{ $contract->wage}}</td>
            <td class="text-center">{{ $contract->start_day}}</td>
            <td class="text-center">{{ $contract->end_day}}</td>
            {{-- <td></td> --}}
            <td class="text-center">{{ $contract->status}}</td>
            <td class="text-center">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-contract-document"
                data-url=>
                <i class="fas fa-print"></i>
            </button>
            </td>
            <td class="text-center">
            {{-- <button type="submit" class="btn btn-success editbtn" data-target="#editModal">Delete</button> --}}
        
            <form action="" method="POST" class="frm-contract-edit">
                <input type="hidden" class="id_wk" value="{{$contract->id}}">
                <button type="submit" class="btn btn-warning btn-edit" id="js-contract-edit" data-toggle="modal" data-target="#editModal">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </form>
            </td>
            <td>
            <form action="{{ route('admin.contracts.destroy', $contract->id)}}" method="POST" class="frm-contract-delete">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-delete" onclick="return confirm('Are you sure DELETE?')">Delete</button>
            </form>
            {{-- <a href="" class="btn btn-success deletebtn"><i class="fas fa-trash" data-target="#deleteModal"></i></a> --}}
            {{-- <button data-url="{{ route('admin.contracts.destroy', $contract->id)}}" type="button" class="btn btn-danger btn-delete">
                <i class="fas fa-trash"></i>
            </button> --}}
            </td>
        </tr>
        
        @endforeach
        @endif
        </tbody>
    </table>
    </div>
    @else
    <div class="">
    
    </div>
    @endif


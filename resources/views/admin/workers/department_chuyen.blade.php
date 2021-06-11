<form action="{{ route('admin.workers.update', $workerId->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">              
          <div class="form-group">
            <div class="row">
                <div class="form-group"	>
                  {{-- <label for="name" class="required">Mã nhân viên</label> --}}
                  <input class="form-control" name="code" type="hidden" value="{{$workerId->code}}" id="name">
                  {{-- <label for="name" class="required">Họ và tên</label> --}}
                  <input class="form-control" name="name" type="hidden" value="{{$workerId->name}}" id="name">
                  {{-- <label for="name" class="required">Số CMND</label> --}}
                  <input class="form-control" name="cmnd_no" type="hidden" value="{{$workerId->cmnd_no}}" id="name">
                  {{-- <label for="name" class="required">Ngày cấp</label> --}}
                  <input class="form-control" name="day_range" type="hidden" value="{{$workerId->day_range}}" id="datepicker">
                  {{-- <label for="name" class="required">Nơi cấp</label> --}}
                  <input class="form-control" name="issued_by" type="hidden" value="{{$workerId->issued_by}}" id="name">
                  {{-- <label for="name" class="required">Địa chỉ</label> --}}
                  <input class="form-control" name="address" type="hidden" value="{{$workerId->address}}" id="name">

                  {{-- <label for="name" class="required">Trình độ</label> --}}
                  <input class="form-control" name="level" type="hidden" value="{{$workerId->level}}" id="name">
                  {{-- <label for="name" class="required">Trường tốt nghiệp</label> --}}
                  <input class="form-control" name="school" type="hidden" value="{{$workerId->school}}" id="name">
                  {{-- <label for="name" class="required">Bằng cấp, chứng chỉ</label> --}}
                  <input class="form-control" name="certificate" type="hidden" value="{{$workerId->certificate}}" id="name">
                  
                </div>
                <div class="form-group"	>
                  {{-- <label for="name" class="required">Giới tính</label> --}}
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="custom-control custom-radio col-sm-4 pl-5 mb-2 pt-1">
                        <input class="custom-control-input" id="male"  name="sex" checked  type="hidden" value="0" {{$workerId->sex == 0 ? 'checked' : ''}}>
                        {{-- <label for="male" class="custom-control-label">Nam</label> --}}
                      </div>
                    </div>
                    <div class="col-sm-6 ">
                      <div class="custom-control custom-radio col-sm-4 pl-5 mb-2 pt-1">
                        <input class="custom-control-input" id="female"  name="sex" type="hidden" value="1" {{$workerId->sex == 1 ? 'checked' : ''}}>
                        {{-- <label for="female" class="custom-control-label">Nữ</label> --}}
                      </div>
                    </div>
                  </div>
                  {{-- <label for="name" class="required">Số điện thoại</label> --}}
                  <input class="form-control" name="phone" type="hidden" value="{{$workerId->phone}}" id="name">
                  {{-- <label for="name" class="required">Email</label> --}}
                  <input class="form-control" name="email" type="hidden" value="{{$workerId->email}}" id="name">
                  {{-- <label for="name" class="required">Ngày vào làm</label> --}}
                  <input class="form-control" name="day_work" type="hidden" value="{{ $workerId->day_work}}" id="datepicker">
                  {{-- <label for="name" class="required">Trạng thái</label> --}}
                  <input class="form-control" name="status" type="hidden" value="{{$workerId->status}}" id="name">
                  {{-- <select class="form-control" id="status" name="status">
                    <option value="-1" {{$workerId->status == -1 ? 'selected' : ''}} >Nghỉ việc</option>
                    <option value="0" {{$workerId->status == 0 ? 'selected' : ''}}>Thử việc</option>
                    <option value="1" {{$workerId->status == 1 ? 'selected' : ''}}>Chính thức</option>
                  </select> --}}
                  {{-- <label for="name" class="required">Kỹ nẵng chuyên môn</label> --}}
                  <input class="form-control" name="skill" type="hidden" value="{{$workerId->skill}}" id="name">
                  <label for="name" class="required">Phòng ban</label>                 
                  <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                    <option value="" >chọn phòng ban</option>
                    @if (!empty($departments))
                    @foreach ($departments as $departmentID =>  $department)
                    <option value="{{$department->id}}" >{{ $department->name}}</option>
                    @endforeach  
                  @endif
                    {{-- @if ($departments)
                      @foreach ($departments as $departmentID => $departmentName) --}}
                        {{-- chu y $workers->department_id --}}
                        {{-- <option value="{{ $departmentID}}" {{  $workerId->department_id == $departmentID ? 'selected' : '' }}  >{{ $departmentName}}</option>
                      @endforeach  
                    @endif --}}
                  </select>
                  {{-- <label for="name" class="required">Chức vụ</label> --}}
                  <input class="form-control" name="position_id" type="hidden" value="{{$workerId->position_id}}" id="name">
                  {{-- <select class="form-control" id="education_id"  name="position_id">
                    <option value=""></option>
                    @if ($positions)
                      @foreach ($positions as $positionID => $positionName)
                        <option value="{{ $positionID}}" {{  $workerId->position_id == $positionID ? 'selected' : '' }}  >{{ $positionName}}</option>
                      @endforeach  
                    @endif
                  </select> --}}
                  {{-- <input class="form-control" name="position_id" type="text" value="{{!empty($workers->position->name)?$workers->position->name: null}}" id="name"> --}}
                </div>
            </div>
              
              <div class="card-footer">
                  <input class="btn btn-secondary" type="submit" value="Chuyển phòng ban">
                </div>
              </div>
          </div>
    </div>   
  </form>  


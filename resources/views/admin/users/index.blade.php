

@extends('layouts.master')
@section('title','List User') <!-- sử dụng cái title đã khai báo ở master -->
<!-- import file css(private) -->
@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/users/user-list.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" /> 
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@push('js')
@section('content')
    <!-- form search -->
    <!-- create category link -->
        <h3 class="text-center pt-5">Danh sách người dùng</h3>
    <!-- display list category table -->
        <a href="{{(route('admin.user.create'))}}"><button class="btn btn-primary mb-2 mt-3" type="button">Thêm mới</button></a>
        {{-- show message --}}
        @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
        @endif

        {{-- show error message --}}
        @if(Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
        @endif
        <table class="table table-bordered table-hover table-striped" >
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Họ và tên</th>
                    <th class="text-center">Địa chỉ email</th>
                    <th class="text-center">Avatar</th>
                    <th class="text-center">Vai trò</th>
                    <th class="text-center">Trạng thái</th>
                    <th colspan="2" class="text-center">Xử lý</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($users))
                    @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->avatar }}" class="img-fluid" style="width: 40px; height: auto;">
                            {{-- <img src="/{{ $user->avatar }}" alt="{{ $user->avatar }}" class="img-fluid" style="width: 40px; height: auto;"> --}}
                        </td>
                        <td>{{ $user->Role->name}}</td>
                        <td>{{ $user->status}}</td>
                        <td class="text-center" ><a href="{{(route('admin.user.edit', $user->id))}}" title=""><i class="fas fa-edit"></i></a></td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  name="submit" value="Delete"><i class="fas fa-trash-alt float-right i1"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
@endsection




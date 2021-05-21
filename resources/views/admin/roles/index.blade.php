

@extends('layouts.master')
@section('title','List Role') <!-- sử dụng cái title đã khai báo ở master -->
<!-- import file css(private) -->
@push('css')   <!-- tên css đặt cho đúng với tên của stack đã đặt trong css.blade.css -->
    <link rel="stylesheet" type="text/css" href="/css/roles/role-list.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" /> 
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@section('content')
    <!-- form search -->
    <!-- create category link -->
        <h3 class="text-center pt-5 mb-3">Quản lí vai trò</h3>
    <!-- display list category table -->
        <a href="create"><button class="btn btn-primary mb-3" type="button">Thêm mới</button></a>

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
                    <th>STT</th>
                    <th>Vai trò người dùng</th>
                    <th colspan="2" class="text-center">Xử lý</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($roles))
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $role->name}}</td>
                        <td class="text-center" ><a href="{{(route('admin.role.edit', $role->id))}}" title=""><i class="fas fa-edit"></i></a></td>
                        <td class="text-center" >
                            <form action="{{ route('admin.role.destroy', $role->id) }}" method="post">
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



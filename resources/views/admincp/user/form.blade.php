@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            @if($message = Session::get('updateok'))
                <div class="alert alert-success alert-block" style="min-width: 300px; text-center">
                    <btn:button class="close" data-dismiss="alert"></btn:button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
        </div>
        <table class="table table-light" id="tableUser">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Email</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Role</th>
                <th scope="col">VIP</th>
                <th scope="col">Xóa tài khoản</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($list as $key => $acc)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$acc->name}}</td>
                    <td>{{$acc->gender}}</td>
                    <td>{{$acc->email}}</td>
                    <td>{{$acc->born}}</td>
                    <td>{{$acc->number_phone}}</td>
                    <td>{{$acc->created_at}}</td>
                    <td>
                        @if($acc->is_admin == 1)
                            Admin
                        @else
                            Người dùng
                        @endif
                    </td>
                    <td>Chưa cập nhật</td>
                    <td class="d-flex">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['account.destroy', $acc->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                            <div class="btn-group  ms-2">
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                        <a href="{{route('account.edit', $acc->id)}}" class="btn btn-warning ms-2">Cấp quyền</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection
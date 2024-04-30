@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    @if($message = Session::get('passwordWrong'))
                        <div class="alert alert-danger alert-block" style="min-width: 300px; text-center">
                            <btn:button class="close" data-dismiss="alert"></btn:button>
                            <strong>{{$message}}</strong>
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header">Quản lý role</div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'PUT', 'route' => ['account.update', $account->id], 'class' => '']) !!}
                        <div class="form-group">
                            {!! Form::label('is_admin', 'Role', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('is_admin', ['0'=>'Người dùng', '1' => 'Admin'], isset($account) ? $account->is_admin : '', ['id' => 'role', 'class' => ['form-control'], 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Nhập mật khẩu Admin', ['class' => 'col-sm-3 control-label mt-3']) !!}
                            <div class="col-sm-12">
                            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                        {!! Form::submit('Lưu', ['class' => 'btn btn-info pull-right mt-2']) !!}
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
        
@endsection
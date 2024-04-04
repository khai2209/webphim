@extends('layouts.app')
@section('content')
    <div class="container">
        {!! Form::open(['method' => 'PUT', 'route' => ['account.update', $account->id], 'class' => 'form-horizontal']) !!}
            {!! Form::label('is_admin', 'Role') !!}
            {!! Form::select('is_admin', ['0'=>'Người dùng', '1' => 'Admin'], isset($account) ? $account->is_admin : '', ['id' => 'role', 'required' => 'required']) !!}
            {!! Form::submit('Lưu', ['class' => 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}
    </div>
        
@endsection
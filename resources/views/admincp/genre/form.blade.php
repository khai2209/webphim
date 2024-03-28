@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý thể loại</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($genre))
                        {!! Form::open(['route'=>'genre.store','method' => 'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['genre.update',$genre->id],'method' => 'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Thể loại', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                                
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('slug', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu', 'id'=>'convert_slug']) !!}
                                
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::textarea('description', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu']) !!}
                                
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không hiển thị'],isset($genre) ? $genre->status : '',[ 'class' => 'form-control',]) !!}
                    
                        </div>
                        @if(!isset($genre))
                            {!! Form::submit('Thêm', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <hr>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Slug</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Quản lý</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $key => $gen)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$gen->title}}</td>
                    <td>{{$gen->slug}}</td>
                    <td>{{$gen->description}}</td>
                    <td>
                        @if($gen->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                    </td>
                    <td class="d-flex">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['genre.destroy', $gen->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                            <div class="btn-group pull-right">
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                        <a href="{{ route('genre.edit', $gen->id) }}" class="btn btn-warning ms-1">Sửa</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

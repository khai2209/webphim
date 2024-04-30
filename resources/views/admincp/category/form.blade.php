@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý danh mục</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-sm-12">
                        @if($message = Session::get('capnhatok'))
                            <div class="alert alert-success alert-block" style="min-width: 300px; text-center">
                                <btn:button class="close" data-dismiss="alert"></btn:button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        @if($message = Session::get('themloi'))
                            <div class="alert alert-danger alert-block" style="min-width: 300px; text-center">
                                <btn:button class="close" data-dismiss="alert"></btn:button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                    </div>
                    @if(!isset($category))
                        {!! Form::open(['route'=>'category.store','method' => 'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['category.update',$category->id],'method' => 'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Danh mục', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('title', isset($category) ? $category->title : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu', 
                                'id' => 'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('slug', isset($category) ? $category->slug : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu', 
                                'id'=>'convert_slug']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::textarea('description', isset($category) ? $category->description : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu']) !!}
                                
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Trạng thái', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không hiển thị'],isset($category) ? $category->status : '',[ 'class' => 'form-control',]) !!}
                            </div>
                        </div>
                        @if(!isset($category))
                        <div class="col-sm-12">
                            {!! Form::submit('Thêm', ['class' => 'btn btn-success mt-2']) !!}
                        </div>
                        @else
                        <div class="col-sm-12">
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success mt-2']) !!}
                        </div>
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

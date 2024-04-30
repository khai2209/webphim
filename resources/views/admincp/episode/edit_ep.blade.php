@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Them phim --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Quản lý tập phim</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                    @if($message = Session::get('capnhatok'))
                        <div class="alert alert-success alert-block" style="min-width: 300px; text-center">
                            <btn:button class="close" data-dismiss="alert"></btn:button>
                            <strong>{{$message}}</strong>
                        </div>
                    @endif

                    @if($message = Session::get('xoaok'))
                        <div class="alert alert-danger alert-block" style="min-width: 300px; text-center">
                            <btn:button class="close" data-dismiss="alert"></btn:button>
                            <strong>{{$message}}</strong>
                        </div>
                    @endif
                
                    @if($message = Session::get('themok'))
                        <div class="alert alert-success alert-block" style="min-width: 300px; text-center">
                            <btn:button class="close" data-dismiss="alert"></btn:button>
                            <strong>{{$message}}</strong>
                        </div>
                    @endif
                
                @if($message = Session::get('themloi'))
                        <div class="alert alert-danger alert-block" style="min-width: 300px; text-center">
                            <btn:button class="close" data-dismiss="alert"></btn:button>
                            <strong>{{$message}}</strong>
                        </div>
                    @endif
                @if(!isset($episode))
                    {!! Form::open(['route'=>'episode.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @else
                    {!! Form::open(['route'=>['episode.update',$episode->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                @endif
                    <div class="form-group">
                        {!! Form::label('movie_title', 'Phim', []) !!}
                        {!! Form::text('movie_title', isset($movie) ? $movie->title : '',[ 'class' => 'form-control select-movie', 'readonly']) !!}
                        {!! Form::hidden('movie_id', isset($movie) ? $movie->id : '') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', 'Link phim', []) !!}
                        {!! Form::text('link', isset($episode) ? $episode->linkfilm : '',[ 'class' => 'form-control', 'required']) !!}
                       
                    </div>
                    @if(isset($episode))
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            {!! Form::text('episode', isset($episode) ? $episode->episode : '',[ 'class' => 'form-control', isset($episode) ? 'readonly' : '']) !!}
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            {!! Form::selectRange('episode', 1,$movie->sotap, 1,[ 'class' => 'form-control']) !!}
                            
                        </div>
                    @endif
                    
                    @if(!isset($episode))
                        {!! Form::submit('Thêm tập', ['class' => 'btn btn-success mt-2']) !!}
                    @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success mt-2']) !!}
                    @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

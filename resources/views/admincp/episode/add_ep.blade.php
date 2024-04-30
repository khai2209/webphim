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
    {{-- Danh sach tap --}}
    <div class="row justify-content-center">
        <table class="table table-light mt-2" id="tableEpisode">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Phim</th>
                <th scope="col" >Link tập phim</th>
                <th scope="col">Tập thêm</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col">Quản lý</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list_ep as $key => $value)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$value->movie->title}}</td>
                    <td style="max-width: 300px">{{$value->linkfilm}}</td>
                    <td>{{$value->episode}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td class="">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['episode.destroy', $value->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                            <div class="btn-group">
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                        <a href="{{ route('episode.edit', $value->id) }}" class="btn btn-warning mt-1">Sửa</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

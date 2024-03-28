@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('episode.create')}}" class="btn btn-success my-3">Quản lý tập</a>
    <div class="row justify-content-center">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Phim</th>
                <th scope="col">Link tập phim</th>
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
                    <td>{!!$value->linkfilm!!}</td>
                    <td>{{$value->episode}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td class="">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['episode.destroy', $value->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                            <div class="btn-group pull-right">
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

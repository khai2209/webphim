@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <a href="{{route('category.create')}}" class="btn btn-success my-3">Quản lý danh mục</a> --}}
    <div class="row justify-content-center">
        <table class="table table-light" id="tableGenre">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Slug</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Quản lý</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $key => $cate)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$cate->title}}</td>
                    <td>{{$cate->description}}</td>
                    <td>{{$cate->slug}}</td>
                    <td>
                        @if($cate->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                    </td>
                    <td class="d-flex">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['genre.destroy', $cate->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                            <div class="btn-group pull-right me-1">
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                        <a href="{{ route('genre.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

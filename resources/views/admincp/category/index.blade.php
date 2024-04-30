@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <a href="{{route('category.create')}}" class="btn btn-success my-3">Quản lý danh mục</a> --}}
    <div class="row justify-content-center">
        <table class="table table-light">
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
                        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $gen->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                            <div class="btn-group pull-right">
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                        <a href="{{ route('category.edit', $gen->id) }}" class="btn btn-warning ms-1">Sửa</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <a href="{{route('category.create')}}" class="btn btn-success my-3">Quản lý danh mục</a> --}}
    <div class="row justify-content-center">
        <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Khu vực</th>
              <th scope="col">Mô tả</th>
              <th scope="col">Slug</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Quản lý</th>
            </tr>
          </thead>
          <tbody>
            @foreach($list as $key => $coun)
              <tr>
                  <th scope="row">{{$key}}</th>
                  <td>{{$coun->title}}</td>
                  <td>{{$coun->description}}</td>
                  <td>{{$coun->slug}}</td>
                  <td>
                      @if($coun->status)
                          Hiển thị
                      @else
                          Không hiển thị
                      @endif
                  </td>
                  <td class="d-flex">
                      {!! Form::open(['method' => 'DELETE', 'route' => ['country.destroy', $coun->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                          <div class="btn-group pull-right">
                              {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                          </div>
                      {!! Form::close() !!}
                      <a href="{{ route('country.edit', $coun->id) }}" class="btn btn-warning ms-1">Sửa</a>
                  </td>
              </tr>
            @endforeach
          </tbody>
          </table>
    </div>
</div>
@endsection

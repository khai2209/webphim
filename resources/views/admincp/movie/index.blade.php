@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-sm-12">
        @if($message = Session::get('xoaok'))
            <div class="alert alert-danger alert-block" style="min-width: 300px; text-center">
                <btn:button class="close" data-dismiss="alert"></btn:button>
                <strong>{{$message}}</strong>
            </div>
        @endif
    </div>
    <table class="table" id="tableFilm">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Phim</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Số tập</th>
            <th scope="col">Slug</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Diễn viên</th>
            <th scope="col">Đạo diễn</th>
            <th scope="col">Hiển thị trên slider</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Định dạng</th>
            <th scope="col">Phụ đề</th>
            <th scope="col">Thời lượng</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Thuộc danh mục</th>
            <th scope="col">Quốc gia</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Ngày cập nhật</th>
            <th scope="col">Năm phát hành</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list as $key => $movie)
            <tr>
                <th scope="row">{{$key}}</th>
                <td><p class="badge text-wrap">{{$movie->title}}</p></td>
                <td><img width="70%" src="{{asset('uploads/movie/'.$movie->image)}}" alt=""></td>
                <td>
                    {{$movie->episode_count}}/{{$movie->sotap}} tập
                    <a href="{{ route('add-ep', $movie->id) }}" class="btn btn-success mt-2">Thêm tập</a>
                </td>
                <td>{{$movie->slug}}</td>
                <td>
                    @if(strlen($movie->description) > 150)
                        {{ substr($movie->description, 0, 100) }}...
                    @endif
                </td>
                <td>{{$movie->caster}}</td>
                <td>{{$movie->director}}</td>
                <td>
                    
                    @if($movie->filmhot!=0)
                    <p class="badge text-bg-primary bg-success text-light">
                        Hiển thị
                    </p>
                    @else
                    <p class="badge text-bg-primary bg-danger text-light">
                        Không hiển thị
                    </p>
                    @endif
                    
                </td>
                <td>
                    
                    @if($movie->status)
                    <p class="badge text-bg-primary bg-success text-light">
                        Hiển thị
                    </p>
                    @else
                    <p class="badge text-bg-primary bg-danger text-light">
                        Không hiển thị
                    </p>
                    @endif
                    
                </td>
                <td>
                    @if($movie->resolution==0)
                        HD
                    @elseif($movie->resolution==1)
                        SD
                    @elseif($movie->resolution==2)
                        HDCam
                    @elseif($movie->resolution==3)
                        CAM
                    @else
                        FullHD
                    @endif
                </td>
                <td>
                    @if($movie->subtitles==0)
                        Phụ đề
                    @else
                        Thuyết minh
                    @endif
                </td>
                <td>{{$movie->runtime}}</td>
                <td>{{$movie->category->title}}</td>
                <td>
                    @if($movie->thuocphim == 'phimle')
                        Phim lẻ
                    @else
                        Phim bộ
                    @endif    
                </td>
                
                <td>{{$movie->country->title}}</td>
                
                <td>
                    @foreach($movie->movie_genre as $gen)
                        <p class="badge text-light">{{$gen->title}}</p>
                    @endforeach
                </td>
               
                <td>{{$movie->create_day}}</td>
                <td>{{$movie->update_day}}</td>
                <td>
                    {!! Form::selectYear('year', 1995, 2025 , isset($movie->year) ? $movie->year : '', ['class' => 'select-year', 'id' => $movie->id, 'placeholder' => 'Năm']) !!}
                </td>
                
                
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $movie->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                        <div class="btn-group">
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        </div>
                    {!! Form::close() !!}
                    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning my-2">Sửa</a>
                    
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection

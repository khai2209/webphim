@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($movie))
                        {!! Form::open(['route'=>'movie.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['movie.update',$movie->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên phim', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                               
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu', 'id'=>'convert_slug']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('runtime', 'Thời lượng', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('runtime', isset($movie) ? $movie->runtime : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('episodes', 'Số tập phim', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::number('episodes', isset($movie) ? $movie->sotap : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nhập dữ liệu']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('caster', 'Diễn viên', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('caster', isset($movie) ? $movie->caster : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('director', 'Đạo diễn', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('director', isset($movie) ? $movie->director : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không hiển thị'],isset($movie) ? $movie->status : '',[ 'class' => 'form-control',]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Định dạng', []) !!}
                            {!! Form::select('resolution', ['0'=>'HD', '1'=>'SD','2'=>'HDCam', '3'=>'CAM', '4'=>'FullHD'],isset($movie) ? $movie->resolution : '',[ 'class' => 'form-control',]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subtitles', 'Phụ đề', []) !!}
                            {!! Form::select('subtitles', ['0'=>'Phụ đề', '1'=>'Thuyết minh'],isset($movie) ? $movie->subtitles : '',[ 'class' => 'form-control',]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category', 'Danh mục', []) !!}
                            {!! Form::select('category_id', $category ,isset($movie) ? $movie->category_id : '',[ 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thuocphim', 'Thuộc danh mục', []) !!}
                            {!! Form::select('thuocphim', ['phimbo'=>'Phim bộ', 'phimle'=>'Phim lẻ'],isset($movie) ? $movie->thuocphim : '',[ 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Quốc gia', []) !!}
                            {!! Form::select('country_id', $country ,isset($movie) ? $movie->country_id : '',[ 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('genre', 'Thể loại', []) !!}<br>
                            @foreach($list_genre as $key => $value)
                                @if(isset($movie))
                                {!! Form::checkbox('genre[]', $value->id, isset($movie_genre) && $movie_genre->contains($value->id) ? true : false) !!}
                                @else
                                {!! Form::checkbox('genre[]', $value->id,'' ) !!}
                                @endif
                                {!! Form::label('genre', $value->title) !!}
                            @endforeach
                            
                            {{-- {!! Form::select('genre_id', $genre ,isset($movie) ? $movie->genre_id : '',[ 'class' => 'form-control']) !!} --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('filmhot', 'Hiển thị trên slider', []) !!}
                            {!! Form::select('filmhot', ['1'=>'Hiển thị', '0'=>'Không hiển thị'],isset($movie) ? $movie->filmhot : '',[ 'class' => 'form-control',]) !!}
                           
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('image', 'Hình ảnh', []) !!}
                            {!! Form::file('image',[ 'class' => 'form-control', 'id' => 'formFile']) !!}
                            @if(!empty($movie))
                                <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                            @endif
                        </div>
                        @if(!isset($movie))
                            {!! Form::submit('Thêm', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid">
    <table class="table table-dark" id="tableFilm">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Phim</th>
            <th scope="col">Hình ảnh</th>
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
            <th scope="col">Số tập</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list as $key => $movie)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$movie->title}}</td>
                <td><img width="55%" src="{{asset('uploads/movie/'.$movie->image)}}" alt=""></td>
                <td>{{$movie->slug}}</td>
                <td>{{$movie->description}}</td>
                <td>{{$movie->caster}}</td>
                <td>{{$movie->director}}</td>
                <td>
                    @if($movie->filmhot!=0)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif
                </td>
                <td>
                    @if($movie->status)
                        Hiển thị
                    @else
                        Không hiển thị
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
                        <p class="badge text-bg-primary bg-white text-dark">{{$gen->title}}</p>
                    @endforeach
                </td>
               
                <td>{{$movie->create_day}}</td>
                <td>{{$movie->update_day}}</td>
                <td>
                    {!! Form::selectYear('year', 1995, 2025 , isset($movie->year) ? $movie->year : '', ['class' => 'select-year', 'id' => $movie->id]) !!}
                </td>
                <td>{{$movie->episode_count}}/{{$movie->sotap}} tập</td>
                
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $movie->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                        <div class="btn-group pull-right">
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        </div>
                    {!! Form::close() !!}
                    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning my-2">Sửa</a>
                    <a href="{{ route('episode.create', $movie->id) }}" class="btn btn-primary">Thêm tập</a>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection

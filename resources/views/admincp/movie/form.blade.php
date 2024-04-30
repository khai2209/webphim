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
                    <div class="col-sm-12">
                        @if($message = Session::get('themok'))
                            <div class="alert alert-success alert-block" style="min-width: 300px; text-center">
                                <btn:button class="close" data-dismiss="alert"></btn:button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                    </div>
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
                            {!! Form::label('category', 'Danh mục', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('category_id', $category ,isset($movie) ? $movie->category_id : '',[ 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('thuocphim', 'Thuộc danh mục', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('thuocphim', ['phimbo'=>'Phim bộ', 'phimle'=>'Phim lẻ'],isset($movie) ? $movie->thuocphim : '',[ 'class' => 'form-control']) !!}
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
                                {!! Form::text('caster', isset($movie) ? $movie->caster : '', ['class' => 'form-control', 'required' ,'placeholder' => 'Nhập dữ liệu']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('director', 'Đạo diễn', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                {!! Form::text('director', isset($movie) ? $movie->director : '', ['class' => 'form-control', 'required' ,'placeholder' => 'Nhập dữ liệu']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không hiển thị'],isset($movie) ? $movie->status : '',[ 'class' => 'form-control',]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Định dạng', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('resolution', ['0'=>'HD', '1'=>'SD','2'=>'HDCam', '3'=>'CAM', '4'=>'FullHD'],isset($movie) ? $movie->resolution : '',[ 'class' => 'form-control',]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('subtitles', 'Phụ đề', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('subtitles', ['0'=>'Phụ đề', '1'=>'Thuyết minh'],isset($movie) ? $movie->subtitles : '',[ 'class' => 'form-control',]) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('country', 'Quốc gia', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('country_id', $country ,isset($movie) ? $movie->country_id : '',[ 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('genre', 'Thể loại', ['class' => 'col-sm-3 control-label']) !!}<br>
                            <div class="col-sm-12 my-2">
                            @foreach($list_genre as $key => $value)
                                @if(isset($movie))
                                {!! Form::checkbox('genre[]', $value->id, isset($movie_genre) && $movie_genre->contains($value->id) ? true : false) !!}
                                @else
                                {!! Form::checkbox('genre[]', $value->id,'' ) !!}
                                @endif
                                {!! Form::label('genre', $value->title , ['class' => 'me-2']) !!}
                            @endforeach
                            </div>
                            
                            {{-- {!! Form::select('genre_id', $genre ,isset($movie) ? $movie->genre_id : '',[ 'class' => 'form-control']) !!} --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('filmhot', 'Hiển thị trên slider', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::select('filmhot', ['1'=>'Hiển thị', '0'=>'Không hiển thị'],isset($movie) ? $movie->filmhot : '',[ 'class' => 'form-control',]) !!}
                            </div>
                           
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('image', 'Hình ảnh', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::file('image',[ 'class' => 'form-control', 'id' => 'formFile']) !!}
                            </div>
                            @if(!empty($movie))
                                <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('image_banner', 'Banner', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                            {!! Form::file('image_banner',[ 'class' => 'form-control', 'id' => 'formFile']) !!}
                            </div>
                            @if(!empty($movie))
                                <img width="20%" src="{{asset('uploads/movie/banner/'.$movie->image_banner)}}" alt="">
                            @endif
                        </div>
                        @if(!isset($movie))
                        <div class="col-md-12">
                            {!! Form::submit('Thêm', ['class' => 'btn btn-success mt-2']) !!}
                        </div>
                        @else
                        <div class="col-md-12">
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

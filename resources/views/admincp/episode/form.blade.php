@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('episode.index')}}" class="btn btn-success my-3">Danh sách tập</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý tập phim</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($episode))
                        {!! Form::open(['route'=>'episode.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['episode.update',$episode->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('movie', 'Phim', []) !!}
                            {!! Form::select('movie_id', ['0'=>'Chọn phim','Phim'=>$list_movie],isset($episode) ? $episode->movie_id : '',[ 'class' => 'form-control select-movie']) !!}
                           
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link phim', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->linkfilm : '',[ 'class' => 'form-control']) !!}
                           
                        </div>
                        @if(isset($episode))
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập phim', []) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '',[ 'class' => 'form-control', isset($episode) ? 'readonly' : '']) !!}
                            </div>
                        @else
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập phim', []) !!}
                                <select name="episode" class="form-control" id="show-episode"></select>
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
        <hr>
    </div>
</div>
{{-- <div class="container-fluid">
    <table class="table table-dark" id="tableFilm">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Phim</th>
            <th scope="col">Tập phim</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_movie as $key => $movie)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$movie->title}}</td>
                <td><img width="55%" src="{{asset('uploads/movie/'.$movie->image)}}" alt=""></td>
                <td>{{$movie->slug}}</td>
                <td>{{$movie->description}}</td>
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
                <td>{{$movie->episodes}}</td>
                <td>{{$movie->category->title}}</td>
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
                <td>{{$movie->runtime}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $movie->id], 'onsubmit'=>'return confirm("Bạn có muốn xóa")', 'class' => 'form-horizontal']) !!}
                        <div class="btn-group pull-right">
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        </div>
                    {!! Form::close() !!}
                    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning">Sửa</a>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div> --}}
@endsection

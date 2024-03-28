@extends('layout')
@section('content')
<div class="full-width" style="padding-top:80px">
    <div class="row">
        <div class="col-md-12 d-flex mt-3" style="background-color:#1A1C22;padding-left:0">
            <div class="class col-md-9">
                <div class="video-player">
                    {!!$episode->linkfilm!!}
                </div>
                <div class="info d-flex flex-column">
                    <div class="name-movie d-flex align-middle">
                        <h2 class="text-light name-film">{{$movie->title}}</h2><i class="bi bi-caret-right-fill"></i></i><p class="text-light episode-film">Tập 1</p>
                    </div>
                    <div class="see-more d-flex flex-column">
                        <div>
                            <span class="text-light">Thể loại:</span> 
                            @foreach($movie->movie_genre as $key => $value)
                                <a href="{{route('genre',[$value->slug])}}" class="text-light" style="padding:4px;border-radius:5px; background-color:#1CC749;">{{$value->title}}</a>
                            @endforeach
                        </div>
                        <div class="py-1">
                            <span class="text-light">Diễn viên:</span> 
                            <span class="text-light cast-film">Dương Húc Văn, Cúc Tịnh Y, Trần Triết Viễn, Mao Tử Tuấn, Mao Hiểu Huệ, Trần Sở Hà</span>
                        </div>
                        <div class="py-1">
                            <span class="text-light">Đạo diễn:</span> 
                            <span class="text-light director-film">Đặng Lệ Quân</span>
                        </div>
                        <div class="py-1">
                            <span class="text-light">Năm phát hành: <span class="text-light year-of-release">{{$movie->year}}</span></span> 
                            <span class="text-light">Số tập: <span class="text-light episodes-film">{{$movie->sotap}}</span></span> 
                        </div>
                        <div class="summary text-light py-1">
                            <span class="">Mô tả:
                            <details class="content-film text-light">
                                {{$movie->description}}
                                <summary class="btn-see-more bg-transparent">Xem thêm</summary>
                            </details>
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 episodes">
                    <h3 class="text-light">Chọn tập</h3>
                    <ul class="list-unstyled row">
                        @foreach($movie->episode as $key => $ep_number)
                            <a href="{{url('watch-movie/'.$movie->slug.'/tap-'.$ep_number->episode)}}" class="episode-item col-sm-2 col-12 {{$tapphim==$ep_number->episode ? 'active-ep' : ''}}" style="min-width: 55px; color:wheat">
                                <li>{{$ep_number->episode}}</li>
                            </a>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="fb-comments" data-href="http://localhost:8000/film-info/Ti%C3%AAn%20ki%E1%BA%BFm%20k%E1%BB%B3%20hi%E1%BB%87p%204" data-width="100%" data-numposts="10"></div>
    </div>
    <div class="text-success my-5">
        <hr>
    </div>
    
</div>
@endsection

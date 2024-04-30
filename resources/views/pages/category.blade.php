@extends('layout')
@section('content')
<div class="full-width col-md-12">
    <div class="category" style="padding-top: 100px;">
        <h4 class="text-light category-name">{{$cate_slug->title}}</h4>
        @include('filterLayout')
        <div class="row row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 align">
            @foreach($movie as $key => $film)
                <article class="item-container">
                    <div class="cover" onclick="redirectToFilm('{{ route('film-info', $film->slug) }}')" style="cursor:pointer">
                        <img src="{{ asset('uploads/movie/'.$film->image) }}" loading="lazy" alt=""
                        class="body-movie__img">
                        <span class="body-movie__name d-block" >{{$film->title}}</span>
                        <span class="body-movie__nd d-block">Thể loại: <i>{{$film->genre->title}}</i> </span>
                        <span class="body-movie__ep d-block"><i>{{$film->sotap}} tập</i></span>
                        <span class="body-movie__sub d-block">
                            <i>
                                @if($film->subtitles==0)
                                Phụ đề
                                @else
                                    Thuyết minh
                                @endif
                            </i>
                        </span>
                        <div class="position-absolute play-btn__center">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="25" fill="#1CC749"/>
                            <mask id="mask0_29_10" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="13" y="13" width="24" height="24">
                            <rect x="13" y="13" width="24" height="24" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_29_10)">
                            <path d="M22.0738 33.9531C20.7423 34.8004 19 33.8439 19 32.2657V16.6433C19 15.0652 20.7423 14.1087 22.0738 14.956L34.3485 22.7672C35.5835 23.5531 35.5835 25.356 34.3485 26.1419L22.0738 33.9531Z" fill="white"/>
                            </g>
                            </svg>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="pagination justify-content-center">
        {!! $movie->links('pagination::bootstrap-4') !!}
    </div>
</div>
@endsection
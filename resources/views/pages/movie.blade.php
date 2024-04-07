@extends('layout')
@section('content')
<div class="full-width">
    <div class="info-film row mx-3">
        <div class="content col-md-8 my-5" style="padding-top: 60px;">
            <h2 class="title-film text-light my-4">{{$movie->title}}</h2>
            <div class="text-success">
                <hr>
              </div>
            <div>
                <span class="episode-film me-2 text-light my-2" style="padding:4px;border-radius:5px; background-color:#24262B;">{{$movie->year}}</span>
                <span class="episode-film me-2 text-light my-2" style="padding:4px;border-radius:5px; background-color:#24262B;">
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
                </span>
                <span class="episode-film me-2 text-light my-2" style="padding:4px;border-radius:5px; background-color:#24262B;">
                    @if($movie->subtitles==0)
                        Phụ đề
                    @else
                        Thuyết minh
                    @endif
                </span>
            </div>
            <div class="my-2">
                <span class="text-light">Thời lượng: </span> 
                <i href="#" class="text-light">{{$movie->runtime}}</i>
            </div>
            <div class="my-2">
                <span class="text-light">Tiến độ: </span> 
                <i href="#" class="text-light"> 
                    @if($movie->thuocphim == 'phimbo')
                        @if($count_total_ep == $movie->sotap) 
                            Hoàn thành
                        @else
                            Đang cập nhật
                        @endif
                    @else
                        Phim lẻ
                    @endif
                     - ({{$count_total_ep}}/{{$movie->sotap}})
                </i>
            </div>
            <div class="my-2">
                <span class="text-light" style="display: inline-block;">Cập nhật:</span> 
                @foreach($episode as $key => $ep)
                
                    <a href="{{url('watch-movie/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" class="text-light" style="padding:1px 8px;border-radius:5px; background-color:#1CC749;">{{$ep->episode}}</a>
                @endforeach
            </div>
            <div class="my-2">
                <span class="text-light" style="display: inline-block;">Thể loại:</span> 
                @foreach($movie->movie_genre as $key => $value)
                    <a href="{{route('genre',[$value->slug])}}" class="text-light" style="padding:1px 4px;border-radius:5px; background-color:#1CC749;">{{$value->title}}</a>
                @endforeach
            </div>
            <div class="my-2">
                <span class="text-light" style="display: inline-block;">Danh mục:</span> 
                <a href="{{route('category',[$movie->category->slug])}}" class="text-light" style="padding:1px 4px;border-radius:5px; background-color:#1CC749;">{{$movie->category->title}}</a>
            </div>
            <div class="my-2">
                <span class="text-light" style="display: inline-block;">Quốc gia:</span> 
                <a href="{{route('country',[$movie->country->slug])}}" class="text-light" style="padding:1px 4px;border-radius:5px; background-color:#1CC749;">{{$movie->country->title}}</a>
            </div>
            <div class="my-2">
                <span class="text-light">Diễn viên:</span> 
                <a href="#" class="text-success cast-film">{{$movie->caster}}</a>
            </div>
            <div class="my-2">
                <span class="text-light">Đạo diễn:</span> 
                <a href="#" class="text-success director-film">{{$movie->director}}</a>
            </div>
            <span class="description my-2">
                <span class="text-light">Mô tả:
                    <details class="content-film text-light">
                        {{$movie->description}}
                        <summary class="btn-see-more bg-transparent">Xem thêm</summary>
                    </details>
                </span>
            </span>
            
            <div class="d-flex my-3">
                <a href="{{url('watch-movie/'.$movie->slug.'/tap-'.$get_first_ep->episode)}}" class="text-light me-2 fw-semibold d-flex align-items-center" style="padding: 8px 8px; background-color:#1CC749; border-radius:5px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
                      </svg>
                    <span class="ms-1">Chiếu phát</span> 
                </a>
                <form action="{{route('favorite.add', ['movie_id'=> $movie->id])}}" method="post">
                    @csrf
                    <button type="submit" class="text-light me-2 fw-semibold d-flex align-items-center" style="padding: 8px 8px; background-color:#2D2F34; border-radius:5px;border:none">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="icon/Add" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M11.5,3 C11.7761424,3 12,3.22385763 12,3.5 L12,4.5 C12,4.77614237 11.7761424,5 11.5,5 L7,5 L7,18.864 L11.0397234,15.4985222 C11.5562588,15.068076 12.2898613,15.0373299 12.8374063,15.4062837 L12.9602766,15.4985222 L17,18.865 L17,14.5 C17,14.2238576 17.2238576,14 17.5,14 L18.5,14 C18.7761424,14 19,14.2238576 19,14.5 L19,19.9324792 C19,20.760901 18.3284325,21.4325168 17.5,21.4325168 C17.1992161,21.4325168 16.9066001,21.3420927 16.6593788,21.1748017 L16.5397234,21.0848111 L12,17.301 L7.4602766,21.0848111 C6.86363721,21.5820106 5.99503637,21.5375119 5.45180014,21.0056172 L5.34766808,20.8927558 C5.15511629,20.6616936 5.03722367,20.3790363 5.0074697,20.0820147 L5,19.9324792 L5,5 C5,3.9456382 5.81587779,3.08183488 6.85073766,3.00548574 L7,3 L11.5,3 Z M18.5,3 C18.7761424,3 19,3.22385763 19,3.5 L18.999,6 L21.5,6 C21.7761424,6 22,6.22385763 22,6.5 L22,7.5 C22,7.77614237 21.7761424,8 21.5,8 L18.999,8 L19,10.5 C19,10.7761424 18.7761424,11 18.5,11 L17.5,11 C17.2238576,11 17,10.7761424 17,10.5 L16.999,8 L14.5,8 C14.2238576,8 14,7.77614237 14,7.5 L14,6.5 C14,6.22385763 14.2238576,6 14.5,6 L16.999,5.999 L17,3.5 C17,3.22385763 17.2238576,3 17.5,3 L18.5,3 Z" id="形状结合" fill="#FFFFFF" fill-rule="nonzero"></path></g></svg>
                        <span class="ms-2">Yêu thích</span> 
                    </button>
                </form>
            </div>
            @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <btn:button class="close" data-dismiss="alert"></btn:button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            @if($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <btn:button class="close" data-dismiss="alert"></btn:button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            @if($message = Session::get('loi'))
                <div class="alert alert-danger alert-block">
                    <btn:button class="close" data-dismiss="alert"></btn:button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            
        </div>
        <a class="img col-md-4">
            <img src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
        </a>
    </div>

    <div class="container">
        <div class="fb-comments" data-href="http://localhost:8000/film-info/Ti%C3%AAn%20ki%E1%BA%BFm%20k%E1%BB%B3%20hi%E1%BB%87p%204" data-width="100%" data-numposts="10"></div>
    </div>
    <div class="text-success my-5">
        <hr>
    </div>
    <div class="position-relative" style="margin-top: 150px">
        <div class="body-content">
            <h3 class="text-light ms-2 category-name">Có thể liên quan</h3>
            <div class="glide">
                <div data-glide-el="track" class="glide__track" style="border-radius: 5px;">
                    <ul class="glide__slides">
                        @foreach($movie_related as $key => $related)
                        <li class="glide__slide">
                            <article class="item-container">
                                <div class="cover" onclick="redirectToFilm('{{ route('film-info', $related->slug) }}')" style="cursor:pointer">
                                    <img src="{{ asset('uploads/movie/'.$related->image) }}" loading="lazy" alt=""
                                    class="body-movie__img">
                                    <span class="body-movie__name d-block" >{{$related->title}}</span>
                                    <span class="body-movie__nd d-block">Thể loại: <i>{{$related->genre->title}}</i> </span>
                                    <span class="body-movie__ep d-block"><i>{{$related->sotap}} tập</i></span>
                                    <span class="body-movie__sub d-block">
                                        <i>
                                            @if($related->subtitles==0)
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
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <span class="glide__arrow glide__arrow--left" data-glide-dir="<" style="left: -40px; border-radius: 10px; padding:0; border: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="text-secondary bi bi-caret-left" viewBox="0 0 16 16">
                        <path d="M10 12.796V3.204L4.519 8zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753"/>
                        </svg>
                    </span>
                    <span class="glide__arrow glide__arrow--right" data-glide-dir=">" style="right: -40px; border-radius: 10px; padding:0; border: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="text-secondary bi bi-caret-right" viewBox="0 0 16 16">
                        <path d="M6 12.796V3.204L11.481 8zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
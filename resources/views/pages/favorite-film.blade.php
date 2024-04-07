@extends('layout')
@section('content')
    <style>
        #body {
            padding-bottom:0;
        }
    </style>
    <div id="wrap">
        @include('wrap-left')
        <div class="wrap-right">
            <div class="wrap-title">
                <h3 class="text-light">Danh sách yêu thích</h3>
            </div>
            <div class="center mt-4" >
                <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1 align">
                    @if($favorite->isEmpty())
                        <div class="text-light justify-content-center">Không có gì ở đây...</div>
                    @else
                        @foreach($favorite as $key => $value)
                            <article class="item-container">
                                <div class="cover" onclick="redirectToFilm('{{ route('film-info', $value->movie->slug) }}')" style="cursor:pointer">
                                    <img src="{{ asset('uploads/movie/'.$value->movie->image) }}" loading="lazy" alt=""
                                    class="body-movie__img">
                                    <span class="body-movie__name d-block" >{{$value->movie->title}}</span>
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
                                {!! Form::open(['method' => 'DELETE', 'route' => ['favorite.del', $value->movie->id],'class' => '']) !!}
                                    <button type="submit" class="text-light me-2 fw-semibold d-flex align-items-center justify-content-center" style="padding: 8px 8px; background-color:#2D2F34; border-radius:5px;border:none; max-width:232.47px; min-width:232.47px">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="icon/Added" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M11.5,3 C11.7761424,3 12,3.22385763 12,3.5 L12,4.5 C12,4.77614237 11.7761424,5 11.5,5 L7,5 L7,18.864 L11.0397234,15.4985222 C11.5562588,15.068076 12.2898613,15.0373299 12.8374063,15.4062837 L12.9602766,15.4985222 L17,18.865 L17,14.5 C17,14.2238576 17.2238576,14 17.5,14 L18.5,14 C18.7761424,14 19,14.2238576 19,14.5 L19,19.9324792 C19,20.760901 18.3284325,21.4325168 17.5,21.4325168 C17.1992161,21.4325168 16.9066001,21.3420927 16.6593788,21.1748017 L16.5397234,21.0848111 L12,17.301 L7.4602766,21.0848111 C6.86363721,21.5820106 5.99503637,21.5375119 5.45180014,21.0056172 L5.34766808,20.8927558 C5.15511629,20.6616936 5.03722367,20.3790363 5.0074697,20.0820147 L5,19.9324792 L5,5 C5,3.9456382 5.81587779,3.08183488 6.85073766,3.00548574 L7,3 L11.5,3 Z M22.4748737,2.81801948 L23.1819805,3.52512627 C23.3772427,3.72038841 23.3772427,4.0369709 23.1819805,4.23223305 L18.232233,9.18198052 C18.0692291,9.34498444 17.8216791,9.37191345 17.6307403,9.26276755 C17.4811322,9.28417272 17.3228177,9.23703124 17.2071068,9.12132034 L14.3786797,6.29289322 C14.1834175,6.09763107 14.1834175,5.78104858 14.3786797,5.58578644 L15.0857864,4.87867966 C15.2810486,4.68341751 15.5976311,4.68341751 15.7928932,4.87867966 L17.749233,6.83557288 L21.767767,2.81801948 C21.9630291,2.62275734 22.2796116,2.62275734 22.4748737,2.81801948 Z" id="形状结合" fill="#FFFFFF" fill-rule="nonzero"></path></g></svg>
                                        <span class="ms-2">Xóa khỏi danh sách</span> 
                                    </button>
                                {!! Form::close() !!}
                            </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
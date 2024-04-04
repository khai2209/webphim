@extends('layout')
@section('content')
<div id="banner">
    <div class="carousel slide slider-container" id="carouselExampleIndicators" data-bs-ride="carousel"">
        <div class=" carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
        </div>
        <ul class="carousel-inner slider-list">
            <li class="slider-item carousel-item active">
                <a class="height-img" href="">
                    <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100 slider-item__img" alt="image1">
                </a>
                <div class="info-banner position-absolute z-2">
                    <h2 class="name-movie text-light text-shadow">Tiên kiếm kỳ hiệp 4</h2>
                    <div class="status-movie text-light text-shadow">Trạng thái: <p
                            class="d-inline-block text-light text-shadow">Đã hoàn thành</p>
                    </div>
                    <div class="category-movie text-light text-shadow">Thể loại: <a
                            class="text-light text-shadow" href="">Tiên kiếm</a></div>
                    <p class="introduce-movie my-3 fw-medium text-light text-shadow">Tiên Kiếm Kỳ Hiệp 4
                        (Sword and Fairy 4) xoay quanh cuộc phiêu lưu của Yun Tian He, một người trẻ sống cô
                        độc trên đỉnh núi. Trong một chuyến đi săn thường nhật,...
                    </p>
                    <a href="#" class="rounded-circle btn-play__banner">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="25" fill="#1CC749"/>
                            <mask id="mask0_29_10" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="13" y="13" width="24" height="24">
                            <rect x="13" y="13" width="24" height="24" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_29_10)">
                            <path d="M22.0738 33.9531C20.7423 34.8004 19 33.8439 19 32.2657V16.6433C19 15.0652 20.7423 14.1087 22.0738 14.956L34.3485 22.7672C35.5835 23.5531 35.5835 25.356 34.3485 26.1419L22.0738 33.9531Z" fill="white"/>
                            </g>
                            </svg>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="bi bi-chevron-left fs-1" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="bi bi-chevron-right fs-1" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>
<div class="body-content position-relative full-width">
    <h3 class="text-light ms-2 category-name">Đề xuất hót</h3>
    <div class="glide">
        <div data-glide-el="track" class="glide__track" style="border-radius: 5px;">
            <ul class="glide__slides">
                @foreach($filmhot as $key => $hot)
                <li class="glide__slide">
                    <article class="item-container">
                        <div class="cover" onclick="redirectToFilm('{{ route('film-info', $hot->slug) }}')" style="cursor:pointer">
                            <img src="{{ asset('uploads/movie/'.$hot->image) }}" loading="lazy" alt=""
                            class="body-movie__img">
                            <span class="body-movie__name d-block" >{{$hot->title}}</span>
                            <span class="body-movie__ep d-block"><i>{{$hot->sotap}} tập</i></span>
                            <span class="body-movie__sub d-block">
                                <i>
                                    @if($hot->subtitles==0)
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
<div class="full-width">
    @foreach($category_home as $key => $cate_home)
    <div class="category mt-5">
        <h4 class="text-light category-name">{{$cate_home->title}}</h4>
        <div class="row row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 align">
            @foreach($cate_home->movie->take(18) as $key => $film)
                <article class="item-container">
                    <div class="cover" onclick="redirectToFilm('{{ route('film-info', $film->slug) }}')" style="cursor:pointer">
                        <img src="{{ asset('uploads/movie/'.$film->image) }}" loading="lazy" alt=""
                        class="body-movie__img">
                        <span class="body-movie__name d-block" >{{$film->title}}</span>
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
    @endforeach
</div>

@endsection
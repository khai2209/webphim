<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Phimmoi</title>
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
        <!-- bootstrap lib -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <!-- bootstrap icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
        <!--video.js  -->
        <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
            <!-- Required Core stylesheet -->
        <link rel="stylesheet" href="../css/glide.core.min.css">
        <!-- Optional Theme stylesheet -->
        <link rel="stylesheet" href="../css/glide.theme.min.css">
        
    </head>
<body>
    <header id="header">
        <div class="header-left">
            <div class="logo-header d-flex align-items-center">
                <a href="{{route('homepage')}}" class="{{ Request::is('/') ? 'active-navbar' : '' }}">
                    <img src="{{ asset('images/LOGO.png') }}" alt="" class="logo">
                </a>
            </div>
            <div class="navbar-left">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav me-auto">
                                @foreach($category as $key => $cate)
                                    <li class="nav-item">
                                        <a href="{{route('category',$cate->slug)}}" class="navbar-item ms-5 d-flex align-items-center {{ Request::is('danhmuc/'.$cate->slug."*") ? 'active-navbar' : '' }}">{{$cate->title}}</a>
                                    </li>
                                @endforeach
                                <li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle navbar-item ms-5 d-flex align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Thể loại
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="genre-link">
                                        <div class="row" style="width: 80vh; margin: 0 1px;">
                                            @foreach($genre as $key => $gen)
                                            <li class="col-md-2"><a class="dropdown-item" href="{{route('genre',$gen->slug)}}">{{$gen->title}}</a></li>
                                            @endforeach
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle navbar-item ms-5 d-flex align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Quốc gia
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="genre-link">
                                        <div class="row" style="width: 80vh; margin: 0 1px;">
                                            @foreach($country as $key => $coun)
                                            <li class="col-md-2"><a class="dropdown-item" href="{{route('country',$coun->slug)}}">{{$coun->title}}</a></li>
                                            @endforeach
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle navbar-item ms-5 d-flex align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Năm phát hành
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="genre-link">
                                        <div class="row" style="width: 80vh; margin: 0 1px;">
                                            @for($year=1995;$year<=2024; $year++)
                                            <li class="col-md-2"><a class="dropdown-item" href="{{url('year/'.$year)}}">{{$year}}</a></li>
                                            @endfor
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="header-right">
            <div class="search-header">
                <form action="{{route('search')}}" method="get" role="search">
                    <input type="text" name="search" id="search-input" class="search-input" autocomplete="off">
                    <button type="submit" class="search-btn" name="submit_search">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <ul class="list-group" id="result" style="display:none; position: absolute; max-height:600px; overflow: hidden;">
            </ul>
            <div class="navbar-left">
                @if(Auth::check())
                    <a href="{{route('account')}}" class="navbar-item fw-normal ms-5 d-flex flex-column align-items-center auth-show {{ Request::is('tai-khoan') ? 'active-navbar' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                        <i class="" style="height: 30px; line-height: 30px; font-size:14px">{{Auth::user()->name}}</i>
                    </a>
                @else
                    <div class="ms-5 d-flex flex-column align-items-center click-login" style="background-color: #1CC749; padding: 8px 10px; border-radius: 5px; cursor: pointer">
                        <i class="" style="height: 22px; line-height: 22px;">Đăng nhập</i>
                    </div>
                @endif
                
            </div>
        </div>
    </header>
    
    <div id="body" style="padding-top:0; min-height: 667px;">
        @yield('content')
    </div>

    <div id="modal" class="hide">
        <div class="box-container">
            <div class="box-header justify-content-end">
                <div class="close-login">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </div>
            </div>
            <div class="box-body d-flex flex-column">
                <div class="box-title my-3">
                    <h3>Đăng nhập</h3>
                </div>
                <p class="py-3">Bạn có thể quản lý tài khoản sau khi đăng nhập.</p>
                <div class="login-with__google d-flex justify-content-center my-3">
                    <button href="" class="btn-login text-primary-emphasis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                        </svg>
                        <span class="fs-6 ps-3">Đăng nhập bằng Google</span>
                    </button>
                </div>
                <div class="login-with__facebook d-flex justify-content-center my-3">
                    <button href="" class="btn-login text-primary-emphasis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                        <span class="fs-6 ps-3">Đăng nhập bằng Facebook</span>
                    </button>
                </div>
                <div class="login-with__account d-flex justify-content-center my-3">
                    <button href="" class="btn-login switch-model__2 text-primary-emphasis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                        </svg>
                        <span class="fs-6 ps-3">Đăng nhập bằng Mật Khẩu</span>
                    </button>
                </div>
            </div>    
            <div class="box-footer d-flex justify-content-center flex-column align-items-center">
                <p class="py-1">Bạn không có tài khoản? <button class="btn-signup__md1 link">Đăng ký</button> </p>
                <p class="py-3 ps-3 fs-7 text-body-tertiary text-center">Nếu bạn chọn "Đăng nhập" túc là bạn đã đồng ý với <a href="" class="link">Thỏa thuận riêng tư</a> và <a href="" class="link">Điều khoản dịch vụ</a> của chúng tôi.</p>
            </div>    
        </div>
    </div>
    <div id="modal-2__login" class="hide">
        <div class="box-container">
            <div class="box-header">
                <div class="back-btn__2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                </div>
                <div class="close-login modal-2__close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </div>
            </div>
            <div class="box-body d-flex flex-column">
                <div class="box-title my-3">
                    <h4>Đăng nhập bằng mật khẩu</h4>
                    @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <btn:button class="close" data-dismiss="alert"></btn:button>
                            <strong>{{$message}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-login">
                    <form action="{{route('login.submit')}}" method="POST" class="d-flex flex-column justify-content-center">
                        @csrf
                        <label for="email" class="d-flex justify-content-center">
                            <input type="email" name="email" class="input-account input-content" required placeholder="Email">
                        </label>
                        <label for="password" class="d-flex justify-content-center">
                            <div class="position-relative">
                                <input type="password" name="password" class="input-password input-content" required  placeholder="Mật khẩu">
                                {{-- <span class="position-absolute eye d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </span>
                                <span class="position-absolute eye d-block d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                    <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                </svg> --}}
                            </span>
                            </div>
                        </label>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="button-login">Đăng nhập</button>
                        </div>
                    </form>
                    <button class="button-forgotpass">Quên mật khẩu</button>
                </div>
                <div class="box-footer d-flex justify-content-center flex-column align-items-center">
                    <p class="py-1"><button class="btn-signup__md2 link">Đăng ký</button> hoặc <button class="btn-another__md2 link">Dùng tài khoản khác đăng nhập</button></p>
                    <p class="py-3 px-3 fs-7 text-body-tertiary text-center">Nếu bạn chọn "Đăng nhập" túc là bạn đã đồng ý với <a href="" class="link">Thỏa thuận riêng tư</a> và <a href=""class="link">Điều khoản dịch vụ</a> của chúng tôi.</p>
                </div>    
            </div>
        </div>
    </div>
    <div id="modal-3__signup" class="hide">
    <div class="box-container">
        <div class="box-header">
            <div class="back-btn__3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
            </div>
            <div class="close-login modal-3__close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </div>
        </div>
        <div class="box-body d-flex flex-column">
            <div class="box-title my-3">
                <h4>Đăng ký</h4>
            </div>
            <div class="form-register">
                <form action="{{route('register.submit')}}" method="POST" class="d-flex flex-column justify-content-center">
                    @csrf
                    <label for="name" class="d-flex justify-content-center">
                        <input type="text" id="name" name="name" class="input-account input-content" value="{{ old('name') }}" required autocomplete="name" placeholder="Tên của bạn">
                        
                    </label>
                    <label for="email" id="email" class="d-flex justify-content-center">
                        <input type="email" name="email" class="input-account input-content" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        
                    </label>
                    <label for="password" class="d-flex justify-content-center">
                        <div class="position-relative">
                            <input type="password" name="password" class="input-password input-content" required autocomplete="new-password" placeholder="Mật khẩu">
                            
                            {{-- <span class="position-absolute eye d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg>
                            </span>
                            <span class="position-absolute eye d-block d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                </svg>
                            </span> --}}
                        </div>
                    </label>
                    <label for="password-confirm" class="d-flex justify-content-center">
                        <div class="position-relative">
                            <input type="password" name="password_confirmation" class="input-password input-content" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                            {{-- <span class="position-absolute eye d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg>
                            </span>
                            <span class="position-absolute eye d-block d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                </svg>
                            </span> --}}
                        </div>
                    </label>
                    <div class="d-flex justify-content-center">
                        <button class="button-login" type="submit">Đăng ký</button>
                    </div>
                </form>
            </div>
            <div class="box-footer d-flex justify-content-center flex-column align-items-center">
                <p class="py-1"><button class="btn-login__md3 link">Đăng nhập</button> hoặc <button class="btn-another__md3 link">Dùng tài khoản khác đăng nhập</button></p>
                <p class="py-3 px-3 fs-7 text-body-tertiary text-center">Nếu bạn chọn "Đăng ký" túc là bạn đã đồng ý với <button class="link">Thỏa thuận riêng tư</button> và <button class="link">Điều khoản dịch vụ</button> của chúng tôi.</p>
            </div>    
        </div>
    </div>
    </div>
    <div id="modal-4__forgotpass" class="hide">
    <div class="box-container">
        <div class="box-header">
            <div class="back-btn__4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
            </div>
            <div class="close-login modal-4__close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </div>
        </div>
        <div class="box-body d-flex flex-column">
            <div class="box-title my-3">
                <h4>Tìm lại mật khẩu</h4>
            </div>
            <p class="py-3 px-5">Xin vui lòng nhập đúng Email tài khoản của bạn, chúng tôi sẽ gửi mật khẩu mới tới Email của bạn.</p>
            <div class="form-login">
                <form action="" class="d-flex flex-column justify-content-center">
                    <label for="account" class="d-flex justify-content-center">
                        <input type="text" name="account" class="input-account input-content" placeholder="Email hoặc số điện thoại di động">
                        <!-- <span class="position-absolute d-block top-0">Nhập Email hoặc số điện thoại</span> -->
                    </label>
                    <div class="d-flex justify-content-center">
                        <button class="button-login">Gửi</button>
                    </div>
                </form>
            </div>
            <div class="box-footer d-flex justify-content-center flex-column align-items-center">
                <p class="py-1"><button class="btn-another__md4 link">Dùng tài khoản khác đăng nhập</button></p>
                <p class="py-3 px-3 fs-7 text-body-tertiary text-center">Nếu bạn chọn "Đăng ký" túc là bạn đã đồng ý với <button class="link">Thỏa thuận riêng tư</button> và <button class="link">Điều khoản dịch vụ</button> của chúng tôi.</p>
            </div>    
        </div>
    </div>
    </div>

    <footer id="footer">
        <div class="footer-cotainer d-flex justify-content-center flex-column">
            <h3 class="footer-title text-light d-flex justify-content-center pt-5">Trường Đại Học Xây Dựng Hà Nội - Hanoi University of Civil Engineering</h3>
            <div class="footer-content d-flex justify-content-center">
                <div class="footer-content__left d-flex flex-column py-5">
                    <span class="text-light pe-5 fs-5">Họ tên: Lưu Quang Khải</span>
                    <span class="text-light pe-5 fs-5">Khóa: K65</span>
                    <span class="text-light pe-5 fs-5">MSSV: 102165</span>
                </div>
                <div class="footer-content__right d-flex flex-column py-5">
                    <span class="text-light fs-5">Thông tin liên hệ</span>
                    <div class="footer-contact d-flex pb-5">
                    <a href="mailto:khai102165@huce.edu.vn" class="pe-3" subject="subject text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" data-name="Layer 1" viewBox="0 0 32 32" id="gmail"><path fill="#ea4435" d="M16.58,19.1068l-12.69-8.0757A3,3,0,0,1,7.1109,5.97l9.31,5.9243L24.78,6.0428A3,3,0,0,1,28.22,10.9579Z"></path><path fill="#00ac47" d="M25.5,5.5h4a0,0,0,0,1,0,0v18a3,3,0,0,1-3,3h0a3,3,0,0,1-3-3V7.5a2,2,0,0,1,2-2Z" transform="rotate(180 26.5 16)"></path><path fill="#ffba00" d="M29.4562,8.0656c-.0088-.06-.0081-.1213-.0206-.1812-.0192-.0918-.0549-.1766-.0823-.2652a2.9312,2.9312,0,0,0-.0958-.2993c-.02-.0475-.0508-.0892-.0735-.1354A2.9838,2.9838,0,0,0,28.9686,6.8c-.04-.0581-.09-.1076-.1342-.1626a3.0282,3.0282,0,0,0-.2455-.2849c-.0665-.0647-.1423-.1188-.2146-.1771a3.02,3.02,0,0,0-.24-.1857c-.0793-.0518-.1661-.0917-.25-.1359-.0884-.0461-.175-.0963-.267-.1331-.0889-.0358-.1837-.0586-.2766-.0859s-.1853-.06-.2807-.0777a3.0543,3.0543,0,0,0-.357-.036c-.0759-.0053-.1511-.0186-.2273-.018a2.9778,2.9778,0,0,0-.4219.0425c-.0563.0084-.113.0077-.1689.0193a33.211,33.211,0,0,0-.5645.178c-.0515.022-.0966.0547-.1465.0795A2.901,2.901,0,0,0,23.5,8.5v5.762l4.72-3.3043a2.8878,2.8878,0,0,0,1.2359-2.8923Z"></path><path fill="#4285f4" d="M5.5,5.5h0a3,3,0,0,1,3,3v18a0,0,0,0,1,0,0h-4a2,2,0,0,1-2-2V8.5a3,3,0,0,1,3-3Z"></path><path fill="#c52528" d="M2.5439,8.0656c.0088-.06.0081-.1213.0206-.1812.0192-.0918.0549-.1766.0823-.2652A2.9312,2.9312,0,0,1,2.7426,7.32c.02-.0475.0508-.0892.0736-.1354A2.9719,2.9719,0,0,1,3.0316,6.8c.04-.0581.09-.1076.1342-.1626a3.0272,3.0272,0,0,1,.2454-.2849c.0665-.0647.1423-.1188.2147-.1771a3.0005,3.0005,0,0,1,.24-.1857c.0793-.0518.1661-.0917.25-.1359A2.9747,2.9747,0,0,1,4.3829,5.72c.089-.0358.1838-.0586.2766-.0859s.1853-.06.2807-.0777a3.0565,3.0565,0,0,1,.357-.036c.076-.0053.1511-.0186.2273-.018a2.9763,2.9763,0,0,1,.4219.0425c.0563.0084.113.0077.169.0193a2.9056,2.9056,0,0,1,.286.0888,2.9157,2.9157,0,0,1,.2785.0892c.0514.022.0965.0547.1465.0795a2.9745,2.9745,0,0,1,.3742.21A2.9943,2.9943,0,0,1,8.5,8.5v5.762L3.78,10.9579A2.8891,2.8891,0,0,1,2.5439,8.0656Z"></path></svg>
                    </a>
                    <a href="https://www.facebook.com/khai.xinsooo" class="px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path fill="#74C0FC" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
                    </a>
                    <a href="tel:+84375412608" class="ps-3" class="position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path fill="#63E6BE" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    </a>
                    <div class="position-relative">
                        <span class="text-light px-2 py-2 d-none" style="border-radius:1rem;background-color:#000;border:1px solid #fafafa" >+84375412608</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/api.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    {{-- ajax --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- glide -->
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    {{-- comment facebook --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="H0vuouAN"></script>
    <script>
        // glide.js
        const config = {
            type: 'carousel',
            perView: 6,
            breakpoints: {
                1700: {
                    perView: 5
                },
                1330: {
                    perView: 4
                },
                1150: {
                    perView: 3
                },
                800: {
                    perView: 2
                }
            },
            gap: 0,
            bound: true,
            autoplay: false,
            hoverpause: true
        };
        new Glide('.glide', config).mount();
    </script>
    <script type="text/javascript">
        // search = ajax
        var typingTimer;
        var doneTypingInterval = 500; // milliseconds
        $(document).ready(function() {
            $('#search-input').keyup(function(){
                clearTimeout(typingTimer);
                $('#result').html('');
                var search = $('#search-input').val();
                var found = false;
                if(search!='' && search.trim()!=='') {
                    $('#result').css('display','inherit');
                    typingTimer = setTimeout(function() {
                        var expression = new RegExp(search, "i");//tạo mới đối tượng biểu thức chính quy, i ko phân biệt chữ hoa or thường
                        $.getJSON('/json/movie.json', function(data) {
                            $.each(data, function (key, value) {
                                if(value.title.search(expression) != -1)  {
                                    $('#result').append('<li style="cursor:pointer;" class="list-item link-class"><a style="display:block; color:white;">' + value.title + '</a></li>');
                                    found = true;
                                }
                            });
                            if (!found) { // Nếu không tìm thấy kết quả nào
                                $('#result').append('<li style="cursor:auto;" class="list-item">Không tìm thấy phim</li>');
                            }
                        });
                    }, doneTypingInterval);
                }
                else {
                    $('#result').css('display','none');
                }
            });
        });
        $('#result').on('click', 'li', function() {
            var click_text= $(this).text().trim();
            var searchText = $(this).text().trim();
            if (click_text !== "Không tìm thấy phim") {
                $('#search-input').val($.trim(click_text));
                window.location.href = "{{ route('search') }}?search=" + encodeURIComponent(searchText);//mã hóa giá trị tìm kiếm để đảm bảo rằng URL được tạo ra đúng cú pháp.
            }
            $('#result').html('');
            $('#result').css('display','none');
        });
    </script>
    {{-- chuyen trang movie --}}
    <script>
        function redirectToFilm(url) {
            window.location.href = url;
        }
    </script>
    <script type="text/javascript">
        var closeModal5 = document.querySelector('.modal-5__close');
        var modal5 = document.querySelector('#modal-account__edit');
        openModalEditAcc.onclick = function() {
            modal5.classList.remove('hide');
            modal5.classList.add('show');
        }
        closeModal(closeModal5,modal5);
    </script>
</body>
</html>
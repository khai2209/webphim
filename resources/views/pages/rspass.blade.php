@extends('layout')
@section('content')
<div class="full-width">
    <div class="info-film row mx-3">
        
        <div class="content col-md-5 my-5" style="padding-top: 210px;">
            <h2 class="title-film text-light my-4 text-center">Đổi mật khẩu</h2>
            <form action="" method="POST" class="d-flex flex-column justify-content-center">
                @csrf
                {{-- <label for="email" class="d-flex justify-content-center">
                    <div class="position-relative">
                        <input type="email" name="email" class="input-password input-content" disabled value="{{$email ?? old('email')}}">
                        
                    </div>
                </label> --}}
                <b style="display: flex;
                        margin: 0px 150px;
                        align-items: center;
                        justify-content: start;
                        color: white;">Mật khẩu</b>
                <label for="password" class="d-flex justify-content-center">
                    <div class="position-relative">
                        <input type="password" name="password" class="input-password input-content"  autocomplete="new-password" placeholder="Mật khẩu mới">
                        @error('password') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                </label>
                <b style="display: flex;
                        margin: 10px 150px 0 150px;
                        align-items: center;
                        justify-content: start;
                        color: white;">Nhập lại mật khẩu</b>
                <label for="password_confirmation" class="d-flex justify-content-center">
                    <div class="position-relative">
                        <input type="password" name="password_confirmation" class="input-password input-content" autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                        @error('password_confirmation') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                </label>
                <div class="d-flex justify-content-center">
                    <button class="button-login" type="submit">OK</button>
                </div>
            </form>
        </div>
        
        <a class="img col-md-7">
            <img src="{{ asset('images/24.jpg')}}" alt="">
        </a>
    </div>
</div>
@endsection
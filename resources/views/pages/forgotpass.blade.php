@extends('layout')
@section('content')
<div class="full-width">
    <div class="info-film row mx-3">
        
        <div class="content col-md-5 my-5" style="padding-top: 200px;display: flex;flex-direction: column;align-items: center;">
            <h2 class="title-film text-light my-4 text-center">Đổi mật khẩu</h2>
            <p class="py-3 px-5 text-light text-center">Xin vui lòng nhập đúng Email tài khoản của bạn.</p>
            @if($message = Session::get('sendEmailSuccess'))
                <div class="alert alert-success alert-block" style="min-width: 300px; text-center">
                    <btn:button class="close" data-dismiss="alert"></btn:button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            @if($message = Session::get('info'))
                <div class="alert alert-success alert-block">
                    <btn:button class="close" data-dismiss="alert"></btn:button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <form action="{{ route('forget.password.post') }}" method="POST" class="d-flex flex-column justify-content-center">
                @csrf
                
                <label for="email" class="d-flex justify-content-center">
                    <div class="position-relative">
                        <input type="email" name="email" class="input-password input-content" placeholder="Email của bạn">
                        @error('email') <small class="text-danger">{{$message}}</small>@enderror
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
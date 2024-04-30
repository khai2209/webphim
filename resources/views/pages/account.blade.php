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
                <h3 class="text-light">Tài khoản của tôi</h3>
            </div>
            
            <div class="center-x" >
                
                    <div class="wrap-profile">
                        @if (session('updateok'))
                            <div class="alert alert-success" role="alert">
                                {{ session('updateok') }}
                            </div>
                        @endif
                        <div class="profile-title color-opacity my-3">Thông tin cá nhân</div>
                        
                        <div class="profile-content d-flex flex-column">
                                <form action="" method="GET">
                                    <div class="d-flex justify-content-between" style="width:100%;">
                                        <div class="d-flex flex-column ps-3 justify-content-between">
                                            <div class="name">
                                                @if(Auth::check())
                                                <span class="username text-light">{{Auth::user()->name}}</span>
                                                @else
                                                <span class="username text-light">Tên người dùng</span>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="button" class="btn text-light" id="editBtn">
                                            <span class="">Chỉnh sửa</span>
                                        </button>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between py-3" style="width:100%;">
                                        <div class="email">
                                            <span class="color-opacity" style="width: 120px; display:inline-block;">Email</span>
                                            @if(Auth::check())
                                            <span class="text-light">{{Auth::user()->email}}</span>
                                            @else
                                            <span class="username text-light">Không được thiết lập</span>
                                            @endif    
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between box position-relative py-3" style="width:100%;">
                                        <div class="phone-number">
                                            <span class="color-opacity" style="width: 120px; display:inline-block;">Ngày sinh</span>    
                                            @if(Auth::check())
                                            <span class="text-light">{{Auth::user()->born}}</span>
                                            @else
                                            <span class="text-light">Không được thiết lập</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between box position-relative py-3" style="width:100%;">
                                        <div class="phone-number">
                                            <span class="color-opacity" style="width: 120px; display:inline-block;">Giới tính</span>    
                                            @if(Auth::check())
                                                <span class="text-light">
                                                    @if(Auth::user()->gender == 0)
                                                        Khác
                                                    @elseif(Auth::user()->gender == 1)
                                                        Nam
                                                    @else
                                                        Nữ
                                                    @endif
                                                </span>
                                            @else
                                            <span class="text-light">Không được thiết lập</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between box position-relative py-3" style="width:100%;">
                                        <div class="phone-number">
                                            <span class="color-opacity" style="width: 120px; display:inline-block;">Số điện thoại</span>    
                                            @if(Auth::check())
                                            <span class="text-light">{{Auth::user()->number_phone}}</span>
                                            @else
                                            <span class="text-light">Không được thiết lập</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div id="modal-account__edit" class="hide">
        <div class="box-container">
            <div class="box-header justify-content-end">
                <div class="modal-5__close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </div>
            </div>
            <div class="box-body d-flex flex-column">
                <div class="box-title my-3">
                    <h4>Thông tin người dùng</h4>
                </div>
                <div class="form-edit">
                    
                    <form action="{{route('taikhoan.update', ['account' => Auth::user()->id])}}" method="POST" class="d-flex flex-column justify-content-center">
                        @csrf
                        @method('PUT')
                        <b style="display: flex;
                        margin: 5px 0px 0 50px;
                        align-items: center;
                        justify-content: start;">Tên của bạn</b>
                        <label for="name" class="d-flex justify-content-center">
                            <input type="text" name="name" class="input-account input-content" required value="{{Auth::user()->name}}">
                        </label>
                        <b style="display: flex;
                        margin: 5px 50px 0 50px;
                        align-items: center;
                        justify-content: start;">Email</b>
                        <label for="email" class="d-flex justify-content-center">
                            <input type="email" name="email" class="input-account input-content" required readonly value="{{Auth::user()->email}}">
                        </label>
                        <b style="display: flex;
                        margin: 5px 50px 0 50px;
                        align-items: center;
                        justify-content: start;">Giới tính</b>
                        <label for="gender" class="d-flex justify-content-center">
                            <select class="input-account input-content" id="inputGroupSelect02" name="gender">
                                <option disabled">Giới tính</option>
                                <option value="0" {{ Auth::user()->gender == 0 ? 'selected' : '' }}>Khác</option>
                                <option value="1" {{ Auth::user()->gender == 1 ? 'selected' : '' }}>Nam</option>
                                <option value="2" {{ Auth::user()->gender == 2 ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </label>
                        <b style="display: flex;
                        margin: 5px 50px 0 50px;
                        align-items: center;
                        justify-content: start;">Ngày sinh</b>
                        <label for="born" class="d-flex justify-content-center">
                            <input type="date" name="born" class="input-account input-content" required value="{{Auth::user()->born}}">
                        </label>
                        <b style="display: flex;
                        margin: 5px 50px 0 50px;
                        align-items: center;
                        justify-content: start;">Số điện thoại</b>
                        <label for="number_phone" class="d-flex justify-content-center">
                            <input type="tel" name="number_phone" class="input-account input-content" required value="{{Auth::user()->number_phone}}">
                        </label>
                        
                        <div class="d-flex justify-content-center">
                            @if(Auth::check())
                                <button type="submit" class="button-login">Lưu</button>
                            @else
                                <button type="submit" class="button-login" style="background-color: #828282; color:#fff; hover" disabled>Lưu</button>
                            @endif
                        </div>
                    </form>    
            </div>
        </div>
    </div>
@endsection
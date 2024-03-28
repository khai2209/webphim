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
                    <div class="profile-title color-opacity my-3">Thông tin cá nhân</div>
                    <div class="profile-content">
                        <div class="d-flex justify-content-between" style="width:100%;">
                            <div class="d-flex flex-column ps-3 justify-content-between">
                                <div class="name">
                                    <span class="username text-light">khai102165</span>
                                </div>
                                <div class="info">
                                    <div class="gender me-4">
                                        <span class="color-opacity">Giới tính:</span> 
                                        <span class="text-light">Nam</span>
                                    </div>
                                    <div class="born me-4">
                                        <span class="color-opacity">Ngày sinh:</span> 
                                        <span class="text-light">2002-09-04</span>
                                    </div>
                                    <div class="uid me-4">
                                        <span class="color-opacity">UID:</span> 
                                        <span class="text-light">46263623722</span>
                                    </div>
                                </div>
                            </div>
                            <button class="btn text-light">
                                <span class="">Chỉnh sửa</span>
                            </button>
                        </div>
                    </div>
                </div>
                    <div class="wrap-profile">
                        <div class="profile-title color-opacity my-3">Tài khoản và bảo mật</div>
                        <div class="profile-content d-flex flex-column">
                                <div class="d-flex justify-content-between py-3" style="width:100%;">
                                    <div class="email">
                                        <span class="color-opacity" style="width: 120px; display:inline-block;">Email</span>    
                                        <span class="text-light">vip8a2002@gmail.com</span>
                                    </div>
                                    <button class="btn text-light">
                                        <span class="">Chỉnh sửa</span>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between box position-relative py-3" style="width:100%;">
                                    <div class="phone-number">
                                        <span class="color-opacity" style="width: 120px; display:inline-block;">Số điện thoại</span>    
                                            <span class="text-light">Không được thiết lập</span>
                                    </div>
                                    <button class="btn text-light">
                                        <span class="">Chỉnh sửa</span>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between box position-relative py-3" style="width:100%;">
                                    <div class="password">
                                        <span class="color-opacity" style="width: 120px; display:inline-block;">Mật khẩu</span>    
                                            <span class="text-light">Không được thiết lập</span>
                                    </div>
                                    <button class="btn text-light">
                                        <span class="">Chỉnh sửa</span>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between box position-relative py-3" style="width:100%;">
                                    <div class="del-acc">
                                        <span class="color-opacity" style="width: 120px; display:inline-block;">Xóa tài khoản</span>    
                                            <span class="text-light">Xóa tài khoản hiện tại</span>
                                    </div>
                                    <button class="btn text-light">
                                        <span class="">Xóa</span>
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
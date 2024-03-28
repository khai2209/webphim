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
                <div class="wrap-profile row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <div class="col">
                        <div class="card bg-transparent" style="width: 16rem;">
                            <a href="" class="history-film__link">
                                <img src="../imgs/banner1.jpg" alt="" class="img-fluid history-film__img">
                                <p class="text-light fs-6 py-2 history-film__name">Tiên kiếm kỳ hiệp</p>  
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
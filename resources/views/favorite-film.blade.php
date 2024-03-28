@extends('sections.layout')

@section('layout')
            <!-- Header -->
            @section('header')
                @include("sections.header")
            @show
            <!-- body -->
            <div id="wrap">
                @include('sections.wrap-left')
                <div class="wrap-right">
                    <div class="wrap-title">
                        <h3 class="text-light">Danh sách yêu thích</h3>
                    </div>
                    <div class="center mt-4" >
                        <div class="wrap-profile row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                            <div class="col">
                                <div class="card bg-transparent" style="width: 16rem;">
                                    <a href="" class="favorite-film__link">
                                        <img src="../imgs/banner1.jpg" alt="" class="img-fluid favorite-film__img">
                                        <p class="text-light fs-6 py-2 favorite-film__name">Tiên kiếm kỳ hiệp</p>  
                                    </a>
                                    
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-transparent" style="width: 16rem;">
                                    <a href="" class="favorite-film__link">
                                        <img src="../imgs/banner1.jpg" alt="" class="img-fluid favorite-film__img">
                                        <p class="text-light fs-6 py-2 favorite-film__name">Tiên kiếm kỳ hiệp</p>  
                                    </a>
                                    
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-transparent" style="width: 16rem;">
                                    <a href="" class="favorite-film__link">
                                        <img src="../imgs/banner1.jpg" alt="" class="img-fluid favorite-film__img">
                                        <p class="text-light fs-6 py-2 favorite-film__name">Tiên kiếm kỳ hiệp</p>  
                                    </a>
                                    
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-transparent" style="width: 16rem;">
                                    <a href="" class="favorite-film__link">
                                        <img src="../imgs/banner1.jpg" alt="" class="img-fluid favorite-film__img">
                                        <p class="text-light fs-6 py-2 favorite-film__name">Tiên kiếm kỳ hiệp</p>  
                                    </a>
                                    
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-transparent" style="width: 16rem;">
                                    <a href="" class="favorite-film__link">
                                        <img src="../imgs/banner1.jpg" alt="" class="img-fluid favorite-film__img">
                                        <p class="text-light fs-6 py-2 favorite-film__name">Tiên kiếm kỳ hiệp</p>  
                                    </a>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
            @include('sections.login')

            <!-- Footer -->
            @include('sections.footer')
        
            <!-- Scripts -->
            @section('scripts-link')
            @endsection
@endsection
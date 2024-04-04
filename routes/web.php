<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountUserController;
//admin controller
use App\Http\Controllers\{CategoryController,CountryController,EpisodeController,GenreController,MovieController,ManagerUserController};


Route::get('/', [IndexController::class, 'home'])->name('homepage');

Route::get('/theloai/{slug}', [IndexController::class, 'genre'])->name('genre');

Route::get('/quocgia/{slug}', [IndexController::class, 'country'])->name('country');

Route::get('/danhmuc/{slug}', [IndexController::class, 'category'])->name('category');

Route::get('/film-info/{slug}', [IndexController::class, 'movie'])->name('film-info');

Route::get('/watch-movie/{slug}/{tap}', [IndexController::class, 'watch'])->name('watch');

Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/year/{year}', [IndexController::class, 'year']);

Route::get('/tim-kiem', [IndexController::class, 'search'])->name('search');

Route::get('/tai-khoan', [IndexController::class, 'accountUser'])->name('account');
Route::get('/favorite-film', [IndexController::class, 'favoriteFilm'])->name('favorite');
Route::post('/add-favorite-film/{movie_id}', [AddFavoriteController::class, 'add'])->name('favorite.add');
Route::get('/history', [IndexController::class, 'historyFilm'])->name('history');;

//dang nhap dang ký user
Route::get('/register-user', [UserController::class, 'register'])->name('register.submit');
Route::post('/register-user', [UserController::class, 'postRegister']);

Route::get('/login-user', [UserController::class, 'login'])->name('login.submit');
Route::post('/login-user', [UserController::class, 'postLogin']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('user')->group(function() {
    Route::resource('taikhoan', AccountUserController::class)->parameters([
        'taikhoan' => 'account'
    ]);
});

Route::prefix('admin')->group(function() {
    Route::resource('account', ManagerUserController::class);
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
    
Route::resource('category', CategoryController::class);
Route::resource('country', CountryController::class);
// app episode
Route::resource('episode', EpisodeController::class);
Route::get('/select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');
Route::resource('genre', GenreController::class);
Route::resource('movie', MovieController::class);

Route::get('/acc-user', [ManagerUserController::class, 'index'])->name('acc-user');
Route::get('/update-year-movie', [MovieController::class, 'update_year']);

Route::get('/login-admin', [AdminController::class, 'login_admin'])->name('login-admin');
Route::post('/login-admin', [AdminController::class, 'postLogin'])->name('admin.login');
Route::get('/sign-out', [AdminController::class, 'signOut'])->name('admin.signout');


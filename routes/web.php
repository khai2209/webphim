<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountUserController;
use App\Http\Controllers\FavoriteController;

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
Route::get('/locphim', [IndexController::class, 'filter'])->name('locphim');

Route::get('/tai-khoan', [IndexController::class, 'accountUser'])->name('account');
Route::get('/favorite-film', [IndexController::class, 'favoriteFilm'])->name('favorite');
Route::post('/add-favorite-film/{movie_id}', [FavoriteController::class, 'add'])->name('favorite.add');
Route::delete('/del-favorite-film/{movie_id}', [FavoriteController::class, 'destroy'])->name('favorite.del');

// Route::get('/history', [IndexController::class, 'historyFilm'])->name('history');;
// Route::post('/add-history-film/{movie_id}', [HistoryController::class, 'add'])->name('favorite.add');
// Route::delete('/del-history-film/{movie_id}', [HistoryController::class, 'destroy'])->name('favorite.del');
//dang nhap dang ký user
Route::get('/register-user', [UserController::class, 'register'])->name('register.submit');
Route::post('/register-user', [UserController::class, 'postRegister']);
Route::get('/login-user', [UserController::class, 'login'])->name('login.submit');
Route::post('/login-user', [UserController::class, 'postLogin']);

Route::get('/forgot-password', [IndexController::class, 'forgotPass'])->name('forgot.submit');
Route::post('/forgot-password', [UserController::class, 'postForgotPass'])->name('forget.password.post');
Route::get('/reset-password/{user}/{token}', [IndexController::class, 'resetPass'])->name('reset.submit');
Route::post('/reset-password/{user}/{token}', [UserController::class, 'postResetPass']);

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
Route::get('/add-ep/{id}', [EpisodeController::class, 'add_ep'])->name('add-ep');
Route::resource('episode', EpisodeController::class);
Route::get('/select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');

Route::resource('genre', GenreController::class);
Route::resource('movie', MovieController::class);

Route::get('/acc-user', [ManagerUserController::class, 'index'])->name('acc-user');
Route::get('/update-year-movie', [MovieController::class, 'update_year']);

Route::get('/login-admin', [AdminController::class, 'login_admin'])->name('login-admin');
Route::post('/login-admin', [AdminController::class, 'postLogin'])->name('admin.login');
Route::get('/sign-out', [AdminController::class, 'signOut'])->name('admin.signout');


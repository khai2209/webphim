<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
//admin controller
use App\Http\Controllers\{CategoryController,CountryController,EpisodeController,GenreController,MovieController};


Route::get('/', [IndexController::class, 'home'])->name('homepage');

Route::get('/theloai/{slug}', [IndexController::class, 'genre'])->name('genre');

Route::get('/quocgia/{slug}', [IndexController::class, 'country'])->name('country');

Route::get('/danhmuc/{slug}', [IndexController::class, 'category'])->name('category');

Route::get('/film-info/{slug}', [IndexController::class, 'movie'])->name('film-info');

Route::get('/watch-movie/{slug}/{tap}', [IndexController::class, 'watch'])->name('watch');

Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/year/{year}', [IndexController::class, 'year']);

Route::get('/tim-kiem', [IndexController::class, 'search'])->name('search');

Route::get('/account', [IndexController::class, 'accountUser'])->name('account');
Route::get('/favorite-film', [IndexController::class, 'favoriteFilm'])->name('favorite');
Route::get('/history', [IndexController::class, 'historyFilm'])->name('history');;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('country', CountryController::class);
// app episode
Route::resource('episode', EpisodeController::class);
Route::get('/select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');
Route::resource('genre', GenreController::class);
Route::resource('movie', MovieController::class);
Route::get('/update-year-movie', [MovieController::class, 'update_year']);


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Movie;
use Auth;

class FavoriteController extends Controller
{
    public function add($movie_id) {
        if(!Auth::check()) {
            return redirect()->back()->with('loi', 'Bạn cần đăng nhập để sử dụng chức năng này');
        }
        else {
            $user_id = Auth::user()->id;
            $existingFavorite = Favorite::where('user_id', $user_id)->where('movie_id', $movie_id)->first();
            if(!$existingFavorite) {
                $favorite = new Favorite();
                $favorite->movie_id = $movie_id;
                $favorite->user_id = $user_id;
                $favorite->save();

                $movie = Movie::find($movie_id);
                $movie->favorite_id = $favorite->id;
                $movie->save();
                return redirect()->back()->with('success', 'Đã thêm vào danh sách yêu thích');
            }else {
                return redirect()->back()->with('warning', 'Đã có trong danh sách yêu thích');
            }
        }
    }
    public function destroy($movie_id) {
        $user_id = Auth::user()->id;
        $favorite = Favorite::where('user_id', $user_id)->where('movie_id', $movie_id)->first();
        // dd($favorite);
        $favorite->delete();
        return redirect()->back()->with('del', 'Đã xóa khỏi danh sách');
    }
}

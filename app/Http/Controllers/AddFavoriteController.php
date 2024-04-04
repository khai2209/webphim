<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AddFavoriteController extends Controller
{
    public function add(Request $request, $movie_id) {
        // if(!auth()->check()) {
        //     return redirect()->back()->with('error', 'Bạn cần đăng nhập để sử dụng chức năng này');
        // }
        $user_id = auth()->id;

        return response()->json($user_id);
        // $existingFavorite = Favorite::where('user_id', $user_id)->where('movie_id',$movie_id)->first();
        // if(!$existingFavorite) {
        //     $favorite = new Favorite();
        //     $favorite->user_id = $user_id;
        //     $favorite->movie_id = $movie_id;
        //     $favorite->save();
        //     return redirect()->route('favorive.add')->with('success', 'Thêm phim thành công');
        // }else {
        //     return redirect()->route('favorive.add')->with('Phim đã có trong danh sách yêu thích');
        // }
    }
}

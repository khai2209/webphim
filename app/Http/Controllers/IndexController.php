<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;

use DB;
class IndexController extends Controller
{
    public function search() {
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('id','DESC')->where('status', 1)->get();
            $genre = Genre::orderBy('id','DESC')->get();
            $country = Country::orderBy('id','DESC')->get();
            
            $movie = Movie::where('title','LIKE', '%'.$search.'%')->orderBy('update_day', 'DESC')->paginate(42);
            $movie->appends(['search' => $search])->links();
            return view('pages.search', compact('category', 'genre', 'country', 'search', 'movie'));
        }else {
            return redirect()->to('/');
        }
    }
    public function home() {
        $filmhot = Movie::where('filmhot', 1)->where('status', 1)->orderBy('update_day', 'DESC')->get(); //mới nhất
        $category = Category::orderBy('id','DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status', 1)->get();
        return view('pages.home', compact('category', 'genre', 'country','category_home','filmhot'));
    }
    public function genre($slug) {
        $category = Category::orderBy('id','DESC')->where('status', 1)->get();
        $gen_slug = Genre::where('slug',$slug)->first();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        //them nhieu the loai
        $movie_genre = Movie_Genre::where('genre_id', $gen_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $film) {
            $many_genre[] = $film->movie_id; //lấy ra list phim thuộc nhiều thể loại
        }
        $movie = Movie::whereIn('id', $many_genre)->orderBy('update_day', 'DESC')->paginate(42);
        return view('pages.genre', compact('category', 'genre', 'country', 'gen_slug', 'movie'));
    }
    public function country($slug) {
        $category = Category::orderBy('id','DESC')->where('status', 1)->get();
        $coun_slug = Country::where('slug',$slug)->first();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $movie = Movie::where('country_id', $coun_slug->id)->orderBy('update_day', 'DESC')->paginate(42);
        return view('pages.country', compact('category', 'genre', 'country', 'coun_slug', 'movie'));
    }
    public function category($slug) {
        $category = Category::orderBy('id','DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first(); //lấy 1 danh mục thông qua 1 slug 
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('update_day', 'DESC')->paginate(42); // lấy phim bằng cách so sánh cateid của Movie với id phim -> liệt kê phim  dựa vào cateid

        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie'));
    }
    public function movie($slug) {
        $filmhot = Movie::where('filmhot', 1)->where('status', 1)->get();
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country', 'movie_genre')->where('slug',$slug)->where('status',1)->first();
        $movie_related = Movie::with('category','genre','country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        //lay 3 tap mois nhat
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode','DESC')->take(3)->get();
        $get_first_ep = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first();
        //lay tong tap da them
        $get_total_ep_added = Episode::with('movie')->where('movie_id',$movie->id)->get();
        $count_total_ep = $get_total_ep_added->count();
        return view('pages.movie', compact('category', 'genre', 'country','filmhot', 'movie','movie_related','episode','get_first_ep','count_total_ep'));
    }

    public function year($year) {
        $category = Category::orderBy('id','DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('update_day', 'DESC')->paginate(42);

        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie'));
    }
    public function watch($slug,$tap) {
        if(isset($tap)){
            $tapphim = $tap;
        }else{
            $tapphim = 1;
        }
        $tapphim = substr($tap,4,1);
        $filmhot = Movie::where('filmhot', 1)->where('status', 1)->get();
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country', 'movie_genre','episode')->where('slug',$slug)->where('status',1)->first();
        $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        // return response()->json($movie);
        return view('pages.watch',compact('category', 'genre', 'country','filmhot', 'movie', 'episode', 'tapphim'));
    }
    public function episode() {
        return view('pages.episode');
    }
    public function accountUser() {
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('pages.account', compact('category', 'genre', 'country'));
    }
    public function favoriteFilm() {
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('pages.favorite-film', compact('category', 'genre', 'country'));
    }
    public function historyFilm() {
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('pages.history', compact('category', 'genre', 'country'));
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Carbon\Carbon;//xu ly thoi gian
use Storage;
use File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function update_year(Request $request) {
        $data = $request->all();
        $movie = Movie::find($data['id_movie']);
        $movie->year = $data['year'];
        $movie->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre = Genre::all();
        $country = Country::pluck('title','id');
        $list = Movie::with('category','movie_genre','country','genre')->withCount('episode')->orderBy('id','DESC')->get();//with('hàm' bên Models)
        //đếm số tập đã thêm


        $path = public_path()."/json/";
        if(!is_dir($path)) {
            mkdir($path, 0700, true);
        }
        File::put($path.'movie.json',json_encode($list));
        return view('admincp.movie.form',compact('list', 'category', 'country', 'genre', 'list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->runtime = $data['runtime'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->filmhot = $data['filmhot'];
        $movie->status = $data['status'];
        $movie->sotap = $data['episodes'];
        $movie->resolution = $data['resolution'];
        $movie->subtitles = $data['subtitles'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->caster = $data['caster'];
        $movie->director = $data['director'];
        foreach($data['genre'] as $key => $value) {
            $movie->genre_id = $value[0];
        }
        $movie->country_id = $data['country_id'];
        $movie->create_day = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->update_day = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->image = $data['image'];
        $movie->image_banner = $data['image_banner'];
        //add img
        $get_image = $request->file('image'); // lấy dữ liệu ảnh
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên ản anh.jpg
            $name_image = current(explode('.', $get_name_image));// tách qua dấu . thành 1 mảng [0]=>anh,[1]=>[jpg]  current: lấy phần tử đầu
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //cộng thêm vào chuỗi 4 số random. sau đó getclientOE nối với phần tử thứ 2 ->anh1313.jpg
            $get_image->move('uploads/movie/',$new_image);//copy sang folder upload
            $movie->image = $new_image;
        }
        $movie->save();
        //add more genre
        $movie->movie_genre()->attach($data['genre']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre = Genre::all();
        $country = Country::pluck('title','id');
        $list = Movie::with('category','genre','country')->orderBy('id','DESC')->get();
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;
        return view('admincp.movie.form',compact('list', 'category', 'country', 'genre','movie','list_genre', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->runtime = $data['runtime'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->sotap = $data['episodes'];
        $movie->resolution = $data['resolution'];
        $movie->subtitles = $data['subtitles'];
        $movie->filmhot = $data['filmhot'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->caster = $data['caster'];
        $movie->director = $data['director'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->update_day = Carbon::now('Asia/Ho_Chi_Minh');
        
        $get_image = $request->file('image'); // lấy dữ liệu ảnh
        if ($get_image) {
            if(!empty($movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên ản anh.jpg
            $name_image = current(explode('.', $get_name_image));// tách qua dấu . thành 1 mảng [0]=>anh,[1]=>[jpg]  current: lấy phần tử đầu
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //cộng thêm vào chuỗi 4 số random. sau đó getclientOE nối với phần tử thứ 2 ->anh1313.jpg
            $get_image->move('uploads/movie/',$new_image);//copy sang folder upload
            $movie->image = $new_image;
        }
        foreach($data['genre'] as $key => $value) {
            $movie->genre_id = $value[0];
        }
        $movie->save();
        $movie->movie_genre()->sync($data['genre']);// xóa hết genre cũ và thêm mới

        return redirect()->to('movie/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
            if(!empty($movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
        

        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();
        Episode::whereIn('movie_id', [$movie->id])->delete();

        $movie->delete(); 
        return redirect()->back();
    }
}

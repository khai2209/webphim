<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Episode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_ep = Episode::with('movie')->orderBy('movie_id', 'DESC')->get();
        return view('admincp.episode.index', compact('list_ep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admincp.episode.form', compact('list_movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_ep($id) {
        $movie = Movie::find($id);
        $list_ep = Episode::with('movie')->where('movie_id', $id)->orderBy('episode', 'DESC')->get();
        return view('admincp.episode.add_ep', compact('list_ep', 'movie'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $existingEpisode = Episode::where('movie_id', $data['movie_id'])->where('episode', $data['episode'])->first();
        if($existingEpisode) {
            return redirect()->back()->with('themloi', "Tập phim đã tồn tại!");
        }
        $ep = new Episode();
        $ep->movie_id = $data['movie_id'];
        $ep->linkfilm = $data['link'];
        $ep->episode = $data['episode'];
        $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        return redirect()->back()->with('themok', 'Thêm thành công');
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
        $episode = Episode::find($id);
        $movie = Movie::find($episode->movie_id);
        $list_ep = Episode::with('movie')->where('movie_id', $id)->orderBy('episode', 'DESC')->get();
        return view('admincp.episode.edit_ep', compact('episode','list_ep', 'movie'));
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
        $ep = Episode::find($id);
        $list_ep = Episode::with('movie')->where('movie_id', $id)->orderBy('episode', 'DESC')->get();
        $movie = Movie::find($data['movie_id']);
        $ep->movie_id = $data['movie_id'];
        $ep->linkfilm = $data['link'];
        $ep->episode = $data['episode'];
        $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        Session::flash('capnhatok', 'Cập nhật thành công.');
        return redirect()->route('add-ep', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::find($id)->delete();
        Session::flash('xoaok', "Xóa thành công.");
        return redirect()->back();
    }

    public function select_movie() {
        $id = $_GET['id'];
        $output = '<option>+++Chọn tập phim+++</option>';
        $movie_by_id = Movie::find($id);
        for($i=1;$i<=$movie_by_id->sotap;$i++) { 
            $output.='<option value="'.$i.'">'.$i.'</option>';
        }
        echo $output;
    }
}

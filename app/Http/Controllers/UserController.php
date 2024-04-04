<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function login() {
        return view('layout');
    }
    public function register() {
        return view('layout');
    }
    
    public function favoriteFilm() {
        return view('pages.favorite');
    }
    public function historyFilm() {
        return view('pages.history');
    }
    
    public function postRegister (Request $request) {
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
        }catch(\Throwable $th) {
            dd($th);
        }
        return redirect()->route('homepage');
    }
    public function postLogin (Request $request) {
        if(Auth::attempt(['email'=>$request->email, 'password' => $request->password])){
            if (auth()->user()->is_admin == 0) {
                return redirect()->route('homepage');
            } else {
                // Nếu là admin, không cho phép đăng nhập và điều hướng lại về trang đăng nhập
                Auth::logout();
                return redirect()->back()->with('error', 'Bạn không có quyền truy cập vào trang này.');
            }
            
        }else {
            return redirect()->back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
        }
        
    }
    public function logout () {
        Auth::logout();
        return redirect()->route('homepage');
    }

    public function edit($id) {
        $data = User::find($id);
    }
    public function destroy($id) {

    }
}

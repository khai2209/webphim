<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function login_admin() {
        return view('auth.login');
    }
    public function postLogin(Request $request) {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'is_admin'=>1])) {
            return redirect()->route('home');
        }else {
            return redirect()->back()->with('err', 'Sai thông tin');
        }
    }
    public function signOut() {
        Auth::logout();
        return view('auth.login');
    }
}

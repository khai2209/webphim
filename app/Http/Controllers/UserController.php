<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;
use Auth;
use Mail;
class UserController extends Controller
{
    public function login() {
        return view('layout');
    }
    public function register() {
        return view('layout');
    }
    
    
    public function postRegister (Request $request) {
        $request->merge(['password' => Hash::make($request->password)]);
        // $request->validate([
        //     'password' => 'confirmed'
        // ], [
        //     'password.confirmed' => 'Mật khẩu không trùng khớp.',
        // ]);
        
        try {
            User::create($request->all());
            Session::flash('signin', 'Đăng ký thành công!');
        }catch(\Throwable $th) {
            Session::flash('signinFail', 'Tài khoản đã được đăng ký! Vui lòng chọn email khác.');
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
            return redirect()->back()->with('loginfail', 'Sai tên đăng nhập hoặc mật khẩu. Vui lòng nhập lại');
        }
        
    }

    public function postForgotPass(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'email.required' => 'Tài khoản không đúng đúng định dạng.',
            'email.exists' => 'Tài khoản không tồn tại.'
        ]);
        $token = \Str::random(64);
        $user = User::where('email', $request->email)->first();
        $user->update(['remember_token'=>$token]);
        Mail::send('emails.forgetPassword', compact('user'), function($message) use($user){
            $message->to($user->email, $user->name);
            $message->subject('Phimmoi - Reset Password');
        });
        return redirect()->back()->with('sendEmailSuccess', 'Hãy kiểm tra email của bạn!');
        // return dd($email);
    }
    public function postResetPass(User $user, $token, Request $request) {
        // $request->validate([
        //     'password' => 'required|string|min:6|confirmed',
        //     'password_confirm' => 'required'
        // ]);
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ],[
            'password.required' => 'Không được bỏ trống.',
            'password.min' => 'Mật khẩu phải từ 6 ký tự.',
            'password.confirmed' => 'Mật khẩu không trùng khớp.',
            'password_confirmation.required' => 'Không được bỏ trống.'
        ]);
        $h_password = Hash::make($request->password);
        $user->update(['password' => $h_password, 'remember_token' => null]);
        return redirect()->route('homepage')->with('info', "Mật khẩu đã được đặt lại.");
        // return dd($h_password);
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

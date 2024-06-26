<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
class ManagerUserController extends Controller
{
    public function index()
    {
        $list = User::all();
        return view('admincp.user.form', compact('list'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $list = User::all();
        $account = User::find($id);
        return view('admincp.user.role', compact('list','account'));
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
        $acc_user = User::find($id);
        $logged_in_user = Auth::user();
        if(!Hash::check($data['password'], $logged_in_user->password)) {
            return redirect()->back()->with('passwordWrong', 'Sai mật khẩu!');
        }
        $acc_user->is_admin = $data['is_admin'];
        $acc_user->save();
        return redirect()->route('acc-user')->with('updateok', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}

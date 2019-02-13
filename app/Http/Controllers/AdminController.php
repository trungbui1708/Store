<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{
    public function getLogin(){
        return view('pages.login');
    }
    public function postLogin(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('categories.index')->with('thongbao','Đăng nhập thành công');
        }
        else{
            return redirect()->route('admin.login')->with('thongbao','Sai tài khoản hoặc mật khẩu');
        }
        // $user = User::all();
        // foreach($user as $ur){
        //     if($ur->password == $request->password){
        //         echo "Thành công";
        //     }
        //     else
        //     {
        //         echo "thất bại";
        //     }
        // }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

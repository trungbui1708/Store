<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\LoginRequest;
class AdminController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->route('categories.index');
            View::share('user',Auth::user());
        }
        else
        {
            session()->flash('error','Sai tài khoản hoặc mật khẩu');
            return back();
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

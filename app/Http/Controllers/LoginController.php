<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Menu;
use App\Category;
use App\Distribution;
use App\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use App\User;
class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('categories.index')->with('thongbao','Đăng nhập thành công');
        }
        else{
            return redirect()->route('admin.login')->with('thongbao','Sai tài khoản hoặc mật khẩu');
        }
    }

    public function getLoginPage(){
        return view('pages.login');
    }

    public function postLoginPage(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('pages.index')->with('thongbao','Đăng nhập thành công');
        }
        else{
            return redirect()->route('pages.get.login')->with('thongbao','Sai tài khoản hoặc mật khẩu');
        }

    }
    

    public function postRegisPage(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:users,name|min:3|max:30',
            'email' => 'required|unique:users,email|email',
            'address' => 'required|min:3',
            'password' => 'required|min:3',
            'phone' => 'required|min:3',
        ],[
            'name.required' => 'Vui lòng nhập thông tin',
            'name.unique' => 'Họ tên đã tồn tại',
            'name.min' => 'Vui lòng nhập nhiều hơn  3 kí tự.',
            'name.max' => 'Username không lớn hơn 30 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không ít hơn 3 kí tự.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.min' => 'Địa chỉ không ít hơn 3 kí tự.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu không ít hơn 3 kí tự.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.min' => 'Số điện thoại không ít hơn 3 kí tự.',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());
        return redirect()->route('pages.get.login')->with('thongbao','Đăng ký thành công.');
    }
}

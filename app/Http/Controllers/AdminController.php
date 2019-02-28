<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{

    public function getLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function getLogoutPage(){
        Auth::logout();
        return redirect()->route('pages.index');
    }

    public function getAdminPage(){
        return view('admin.page');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->validate($request,[
            'name' => 'unique:users,name',
            'username' => 'unique:users,username',
            'email' => 'unique:users,email'
        ],[]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password_hash = Hash::make($user->password);
        $user->images = $request->images;
        $user->level = $request->level;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('user.show',$user)->with('thongbao','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password_hash = Hash::make($user->password);
        $user->images = $request->images;
        $user->level = $request->level;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('user.show',$user)->with('thongbao','Thêm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('destroy_success');
        return redirect()->route('user.index')->with('thongbao','Xóa thành công.');
    }
}

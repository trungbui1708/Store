<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
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
    public function store(StoreUserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $data = $request->except(['images']);

        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
         if($request->hasFile('images')){
            $images = $request->images;
            $file_ext = $images->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name = $request->images->store('users');
                $data['images'] = $file_name;
            }
        }
        $request->images = $file_name;
        $user = User::create($data);
        return redirect()->route('users.show',$user)->with('thongbao','Thêm thành công.');
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
    public function update(UpdateUserRequest $request, User $user)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $data = $request->except(['images']);

        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
         if($request->hasFile('images')){
            $images = $request->images;
            $file_ext = $images->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name = $request->images->store('users');
                $data['images'] = $file_name;
            }
        }
        Storage::delete($user->images);
        $request->images = $file_name;
        $user->update($data);
        return redirect()->route('users.show',$user)->with('thongbao','Thêm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete($user->images);
        $user->delete();
        session()->flash('destroy_success');
        return redirect()->route('users.index')->with('thongbao','Xóa thành công.');
    }
}

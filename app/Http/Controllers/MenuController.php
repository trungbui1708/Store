<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Menu::all();
        return view('admin.menu.index',compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $this->validate($request,[
            'name' => 'unique:menu,name'
        ],[
            'name.unique' => 'Loại danh mục đã tồn tại.',
        ]);
        
        $menu = new menu();
        $menu->fill($request->all());
        $menu->slug = changeTitle($request->name);
        $menu->save();
        return redirect()->route('menu.show',$menu)->with('thongbao','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        return view('admin.menu.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        
        return view('admin.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, menu $menu)
    {
        $menu->slug = changeTitle($request->name);
        $menu->fill($request->all());
        $menu->save();
        return redirect()->route('menu.show',$menu)->with('thongbao','Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        $menu->delete();
        session()->flash('destroy_success');
        return redirect()->route('menu.index')->with('thongbao','Xóa thành công.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Distribution;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\DistributionRequest;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Distribution::all();
        return view('admin.distribution.index',compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.distribution.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistributionRequest $request)
    {
        $distribution = new Distribution();
        $distribution->slug = changeTitle($request->name);
        $distribution->fill($request->all());
        $distribution->save();
        return redirect()->route('distribution.show',$distribution)->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        return view('admin.distribution.show',compact('distribution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribution $distribution)
    {
        $category = Category::all();
        return view('admin.distribution.edit',compact('distribution','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribution $distribution)
    {
        $this->validate($request,[
            'name' => 'required|unique:distributions,name|min:3|max:30'
        ],[
            'name.required' => 'Tên thể loại không được để trống.',
            'name.min' => 'Tên thể loại không ít hơn 3 kí tự.',
            'name.max' => 'Tên thể loại không lớn hơn 30 ký tự'
        ]);
        $distribution->slug = changeTitle($request->name);
        $distribution->fill($request->all());
        $distribution->save(); 
        return redirect()->route('distribution.show',$distribution)->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
        $distribution->delete();
        session()->flash('destroy_success');
        return redirect()->route('distribution.index')->with('thongbao','Xóa thành công.');
    }
}

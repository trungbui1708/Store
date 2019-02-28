<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Menu;
use Excel;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Imports\CategoryImport;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('admin.category.add',compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->slug= changeTitle($request->name);
        $category->fill($request->all());
        $category->save();
        return redirect()->route('categories.show',$category)->with('thongbao','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $menu = Menu::all();
        return view('admin.category.edit',compact('menu','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->slug = changeTitle($request->name);
        $category->fill($request->all());
        $category->save();
        return redirect()->route('categories.show',$category)->with('thongbao','Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('destroy_success');
        return redirect()->route('categories.index')->with('thongbao','Xóa thành công.');
    }

    public function importData(Request $request){
        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path,function($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach($data as $key => $value){
                    $category = new Category();
                    $category->name = $value->name;
                    $category->slug = changeTitle($value->name);
                    $category->menu_id = $value->menu_id;
                    $category->save();
                    return redirect()->route('categories.index')->with('thongbao','Thêm thành công.');
                }
            }
        }
    }

    public function import(Request $request) 
    {
        if($request->hasFile('file')){
            Excel::load($request->file('file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $key => $row) {
                    $data['name'] = $row['name'];
                    $data['menu_id'] = $row['menu_id'];

                    if(!empty($data)) {
                        DB::table('categories')->insert($data);
                    }
                }
            });
        }

        Session::put('success', 'Youe file successfully import in database!!!');

        return back();
    }
}

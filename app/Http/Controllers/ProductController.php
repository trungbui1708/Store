<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Distribution;
use App\User;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Product::all();
        return view('admin.product.index',compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distribution = Distribution::all();
        $user = User::all();
        return view('admin.product.add',compact('distribution','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->validate($request,[
            'name' => 'unique:products,name',
        ],[
            'name.unique' => 'Tên sản phẩm đã bị trùng',
        ]);
        $product = Product::create($request->all());
        return redirect()->route('product.show',$product)->with('thongbao','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $distribution = Distribution::all();
        $user = User::all();
        return view('admin.product.edit',compact('product','distribution','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        
        $product->fill($request->all());
        $product->save();
        return redirect()->route('product.show',$product)->with('thongbao','Thêm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('destroy_success');
        return redirect()->route('product.index')->with('thongbao','Xóa thành công.');
    }
}

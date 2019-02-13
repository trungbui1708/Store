<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Distribution;
use App\User;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

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
    public function store(StoreProductRequest $request)
    {
        $data = $request->except(['images']);
        $data_tb = $request->except(['thumbnail']);

        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        if($request->hasFile('images')){
            $images = $request->images;
            $file_ext = $images->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name = $request->images->store('products');
                $data['images'] = $file_name;
            }
        }
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->thumbnail;
            $file_ext = $thumbnail->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name_tb = $request->thumbnail->store('products');
                $data['thumbnail'] = $file_name_tb;
            }
        }
        $request->images = $file_name;
        $request->thumbnail = $file_name_tb;
        $product = Product::create($data);
        return redirect()->route('products.show',$product)->with('thongbao','Thêm thành công.');
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->except(['images']);
        $data_tb = $request->except(['thumbnail']);

        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        if($request->hasFile('images')){
            $images = $request->images;
            $file_ext = $images->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name = $request->images->store('products');
                $data['images'] = $file_name;
            }
        }
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->thumbnail;
            $file_ext = $thumbnail->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name_tb = $request->thumbnail->store('products');
                $data['thumbnail'] = $file_name_tb;
            }
        }
        Storage::delete($product->images);
        Storage::delete($product->thumbnail);
        $request->images = $file_name;
        $request->thumbnail = $file_name_tb;
        $product->update($data);
        return redirect()->route('products.show',$product)->with('thongbao','Sửa thành công.');
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
        return redirect()->route('products.index')->with('thongbao','Xóa thành công.');
    }
}

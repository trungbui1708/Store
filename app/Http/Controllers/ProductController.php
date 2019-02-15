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
        $request->merge(['slug' => changeTitle($request->name)]);
        $data = $request->except(['images','thumbnail']);

        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        
        if($request->hasFile('images')){
            
            $images_request = $request->images;
            $array_add = array();
            foreach($images_request as $ir)
            {
                $img_name = $ir->getClientOriginalName();
                $file_ext = $ir->getClientOriginalExtension();
                if(in_array($file_ext, $allow_type)){
                    $file_name = $ir->store('products');
                    array_push($array_add,$file_name);
                }
            }
            $json_string = json_encode($array_add);
            $data['images'] = $json_string;
        }

        if($request->hasFile('thumbnail')){
            $thumbnail = $request->thumbnail;
            $file_ext = $thumbnail->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name_tb = $request->thumbnail->store('products');
                $data['thumbnail'] = $file_name_tb;
            }
        }
        $request->images = $json_string;
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
        $request->merge(['slug' => changeTitle($request->name)]);
        $data = $request->except(['images','thumbnail']);

        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        if($request->hasFile('images')){
            
            $images_request = $request->images;
            $array_add = array();
            foreach($images_request as $ir)
            {
                $img_name = $ir->getClientOriginalName();
                $file_ext = $ir->getClientOriginalExtension();
                if(in_array($file_ext, $allow_type)){
                    $file_name = $ir->store('products');
                    array_push($array_add,$file_name);
                }
            }
            $json_string = json_encode($array_add);
            $data['images'] = $json_string;
        }
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->thumbnail;
            $file_ext = $thumbnail->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name_tb = $request->thumbnail->store('products');
                $data['thumbnail'] = $file_name_tb;
            }
        }
        $product_images = json_decode($product->images);
        foreach($product_images as $pi)
        {
            Storage::delete($pi);
        }
        
        Storage::delete($product->thumbnail);
        $request->images = $json_string;
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

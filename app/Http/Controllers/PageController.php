<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class PageController extends Controller
{
    public function index(){
        $product_seller = Product::where('best_sellers',1)->get();
        $product_view = Product::where('views',1)->get();
        $product_discount  = Product::where('discount','>',0)->get();
        $product_hot = Product::where('hot',1)->get();
        return view('pages.trangchu',compact('product_seller','product_view','product_discount','product_hot'));
    }

}
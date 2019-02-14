<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Product;
use App\Menu;
use App\Category;
use App\Distribution;

class PageController extends Controller
{
    function __construct(){
        View::share('menu',Menu::all());
        View::share('category',Category::all());
        View::share('distribution',Distribution::all());
    }
    public function index(){
        $product_seller = Product::where('best_sellers',1)->get();
        $product_view = Product::where('views',1)->get();
        $product_discount  = Product::where('discount','>',0)->get();
        $product_hot = Product::where('hot',1)->get();
        return view('pages.trangchu',compact('product_seller','product_view','product_discount','product_hot'));
    }

    public function getDistribution($id)
    {
        $distribution = Distribution::find($id);
        $dis_pr = Product::where('distribution_id',3)->get();
        return view('pages.list_product',compact('distribution','dis_pr'));
    }
}
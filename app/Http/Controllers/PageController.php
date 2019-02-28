<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Product;
use App\Menu;
use App\Category;
use App\Distribution;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Article;
class PageController extends Controller
{
    public function index(){
        $product_seller = Product::where('best_sellers',1)->get();
        $product_view = Product::where('views',1)->get();
        $product_discount  = Product::where('discount','>',0)->get();
        $product_hot = Product::where('hot',1)->get();
        $article = Article::paginate(10);
        return view('pages.trangchu',compact('product_seller','product_view','product_discount','product_hot','article'));
    }

    public function getDistribution($id)
    {
        $distribution_get = Distribution::find($id);
        $dis_pr = Product::where('distribution_id',$id)->get();
        return view('pages.list_product',compact('distribution_get','dis_pr'));
    }

    public function getProduct($id){
        $product_single = Product::find($id);
        return view('pages.product_ditail',compact('product_single'));
    }

    
    public function searchProduct(Request $request){
        
        if($request->ajax()){
            $query = $request->get('key');
            $list_product = Product::where('name','LIKE','%'.$query.'%')->limit(5)->get();
			if(count($list_product)>0){
				$data = '<br>';
				foreach($list_product as $product){
                    $data .= "
                    <li class='row' >
                        <a href=''>
                            <div class='col-sm-4'>
                                <img style='margin :10px; width:80%; border: 1px solid #ccc; border-radius: 5px' src='storage/$product->thumbnail' >
                            </div>
                            <div class='col-sm-8' style='margin-top: 10px;' >
                                <h3 class='col-sm-12'><a href='product/$product->id'>$product->name</a></h3>
                                <span class='col-sm-12'>".number_format($product->price)." <sup>đ</sup></span>
                            </div>
                        </a>
                    </li>
                    ";
				}
				echo $data;
			}
		}
    }
    public function getCartAjax(){
		return view('pages.cart_detail');
    }
    public function getViewAccount() {
        return view('pages.my-account');
    }

    public function getArticleSingle($slug)
    {
        $article_single = Article::where('slug',$slug)->first();
        $article_hot = Article::where('hot',1)->inRandomOrder()->take(5)->get();
        return view('pages.article_single',compact('article_single','article_hot'));
    }
}
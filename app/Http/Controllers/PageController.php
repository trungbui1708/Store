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
use App\Order;
use App\OrderDetail;
use App\Http\Requests\ChangePasswordRequest;
use App\AprioriProduct;


class PageController extends Controller
{
    public function index(){
        $product_seller = Product::where('best_sellers','>',0)->orderBy('best_sellers', 'desc')->take(10)->get();
        $product_view = Product::where('views','>',1)->orderBy('views','desc')->get();
        $product_discount  = Product::where('discount','>',0)->get();
        $product_hot = Product::where('hot',1)->get();
        $article = Article::paginate(10);
        return view('pages.trangchu',compact('product_seller','product_view','product_discount','product_hot','article'));
    }

    public function getDistribution($id)
    {
        $distribution_get = Distribution::find($id);
        $dis_pr = Product::where('distribution_id',$id)->paginate(6);
        return view('pages.list_product',compact('distribution_get','dis_pr'));
    }
    public function getCategoryProduct($id)
    {
        $distribution_get = Category::find($id);
        $dis_pr = Category::find($id)->product()->paginate(6);
        return view('pages.list_product',compact('distribution_get','dis_pr'));
        
    }

    public function getProduct($id){
        $product_single = Product::where('id',$id)->first();
        $view_plus = $product_single->views + 1;
        $product_single->views = $view_plus;
        $product_single->save();

        $apriori_product = AprioriProduct::all();
        $product_view = array();
        foreach ($apriori_product as $ap)
        {
            $product_pp = json_decode($ap->product_id,true);

            foreach ($product_pp as $item_pp)
            {
                if($id == $item_pp )
                {
                    foreach(json_decode($ap->apriori_product_id,true) as $item_ii)
                    {
                        $product_ii = Product::where('id',$item_ii)->first();
                        array_push($product_view,$product_ii);
                    }
                }
            }

        }
        return view('pages.product_ditail',compact('product_single','product_view'));
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

    public function getChangePassword()
    {
        return view('pages.change_password');
    }
    public function postChangePassword(ChangePasswordRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route('pages.account')->with('thongbao','Đổi mật khẩu thành công.');
    }
    public function getOrder()
    {
        if(Auth::check())
        {
            $order = Order::where('user_id',Auth::user()->id)->get();
            return view('pages.order',compact('order'));
        }
        
    }
    
    public function getOrderDetail($id)
    {   
        $order = Order::find($id);
        return view('pages.orderdetail',compact('order'));
    }

    public function searchPrice(Request $request)
    {
        $this->validate($request,[
            'price_begin' => 'required|numeric',
            'price_finish' => 'required|numeric'
        ],[]);

        if($request)
        {
                $product_price = Product::where('price','>',$request->price_begin)->where('price','<',$request->price_finish)->paginate(5);
                return view('pages.search-price',compact('product_price'));
        }
        else
        {
            return view('pages.search-price');
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\OrderDetail;
use Session;
use Auth;

class CartController extends Controller
{
    // public function __constructor(){
    //     $this->middleware('Auth:customer');
    // }

    public function index(){
    	return view('customer.cart');
    }

    public function getAddtoCart( Request $request,$id){
    	$product = Product::findOrFail($id);
		$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
		$cart->addItem($product,$id);
    	$request->session()->put('cart',$cart);
    	return redirect()->back();
    }
    public function deleteCart($id){
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	if(count($cart->items)>0){
    		Session::put('cart',$cart);
    	}else{
    		Session::forget('cart');
    	}
    	return redirect()->back();
    }
    public function deleteallCart(){
        Session::forget('cart');
        return redirect()->back();
	}
	public function addCartAjax(Request $request)
	{
		if($request->ajax()){
			if($request->ajax()){
				$id = $request->post('id'); 
				$product = Product::findOrFail($id);
				$oldCart = Session('cart')?Session::get('cart'):null;
				$cart = new Cart($oldCart);
				$cart->addItem($product,$id);
				$request->session()->put('cart',$cart);
				echo json_encode($cart->items);
			}
        }
	}
	public function deleteCartAjax(Request $request){
		if($request->ajax()){
			$id = $request->post('id');
			$oldCart = Session::has('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
			$cart->removeItem($id);
			Session::put('cart',$cart);
			if(count($cart->items)>=0){
				echo json_encode($cart->items);
			}else{
				Session::forget('cart');
			}
		}
	}

	public function deleteOneCartAjax(Request $request){
		if($request->ajax()){
			$id = $request->post('id');
			$oldCart = Session::has('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
			$cart->removeItemSL($id);
			Session::put('cart',$cart);
			if(count($cart->items)>=0){
				echo json_encode($cart->items);
			}
		}
	}
	public function createPostOrder(Request $request){
		if(Session::has('cart')){
			$cart = Session('cart');
			$order_detail = json_encode($cart->items);
			//dd($cart->totalPrice);
			$delivery_date = date("Y/m/d H:i:s", strtotime("+3 day"));
			$order = [
				'sum_money' => $cart->totalPrice,
				'order_code' => str_random(10),
				'delivery_date' => $delivery_date,
				'user_id' => Auth::user()->id,
				'count' => $cart->totalQuantity,
				'order_detail' => $order_detail
			];
			Order::create($order);	
			Session::forget('cart');
			return redirect()->route('cart.detail')
			->with("alert",$order['order_code']);
		}
		
	}
}
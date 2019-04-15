<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Carbon;
class ThongKeController extends Controller
{
    public function getOrderDate()
    {
    	return view('admin.statistical.orderdate');
    }
    public function postOrderDate(Request $request)
    {
        $order_date = Order::where('created_at','>',$request->time_begin)->where('created_at','<',$request->time_finish)->get();
       $qty_product_order = 0;
       $money_sum_order =0;
        foreach ($order_date as $value) {
            $order_detail = json_decode($value->order_detail,true);
            foreach ($order_detail as $od) {
                $money_sum_order = $money_sum_order + $od['price'];
                $qty_product_order = $qty_product_order + $od['qty'];
            }
        }
        $product_qty = 0;
        $product = Product::all();
        foreach ($product as $value) {
            $product_qty = $product_qty + $value->quantity;
        }
        $time_begin = $request->time_begin;
        $time_finish = $request->time_finish;
    	return view('admin.statistical.orderdate',compact('order_date','product_qty','qty_product_order','money_sum_order','time_begin','time_finish'));
    }

    public function getOrderMonth()
    {
        return view('admin.statistical.mothdate');
    }

    public function postOrderMonth(Request $request)
    {
        $month = Carbon\Carbon::createFromFormat('Y-m', $request->time_month)->month;
        
        $order_date = Order::whereMonth('created_at','=',$month)->get();
        $qty_product_order = 0;
        $money_sum_order =0;
        foreach ($order_date as $value) {
            $order_detail = json_decode($value->order_detail,true);
            foreach ($order_detail as $od) {
                $money_sum_order = $money_sum_order + $od['price'];
                $qty_product_order = $qty_product_order + $od['qty'];
            }
        }
        $product_qty = 0;
        $product = Product::all();
        foreach ($product as $value) {
            $product_qty = $product_qty + $value->quantity;
        }
        $time_month = $request->time_month;
        
        return view('admin.statistical.mothdate',compact('order_date','product_qty','qty_product_order','money_sum_order','time_month'));
    }

    public function getOrderYear()
    {
        return view('admin.statistical.year_date');
    }

    public function postOrderYear(Request $request)
    {
        $year = Carbon\Carbon::createFromFormat('Y-m', $request->time_year)->year;
        $order_date = Order::whereYear('created_at','=',$year)->get();
        $qty_product_order = 0;
        $money_sum_order =0;
        foreach ($order_date as $value) {
            $order_detail = json_decode($value->order_detail,true);
            foreach ($order_detail as $od) {
                $money_sum_order = $money_sum_order + $od['price'];
                $qty_product_order = $qty_product_order + $od['qty'];
            }
        }
        $product_qty = 0;
        $product = Product::all();
        foreach ($product as $value) {
            $product_qty = $product_qty + $value->quantity;
        }
        $time_year = $year;
        
        return view('admin.statistical.year_date',compact('order_date','product_qty','qty_product_order','money_sum_order','time_year'));
    }
}

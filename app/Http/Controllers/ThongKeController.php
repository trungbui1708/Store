<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class ThongKeController extends Controller
{
    public function getOrderDate()
    {
    	return view('admin.statistical.orderdate');
    }
    public function postOrderDate(Request $request)
    {
    	$order_date = Order::where('created_at','>',$request->time_begin)->where('created_at','<',$request->time_finish)->get();
    	return view('admin.statistical.orderdate',compact('order_date'));
    }
}

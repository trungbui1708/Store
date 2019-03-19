<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Product;
use App\Menu;
use App\Category;
use App\Distribution;
use App\Order;
use App\Article;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    function __construct()
    {
        View::share('menu',Menu::all());
        View::share('category',Category::all());
        View::share('distribution',Distribution::all());
        View::share('product',Product::all());
        View::share('order',Order::all());
        View::share('article',Article::all());
        View::share('product_hot',Product::where('hot',1)->paginate(5));
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

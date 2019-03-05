<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('admin.product.index');
// });

//nhóm route admin
//
Route::group(['prefix' => 'admin','middleware' => 'admincheck'],function() {
    Route::get('/admin','AdminController@getAdminPage')->name('admin.page');
    Route::resource('menus','MenuController');
    Route::resource('categories','CategoryController');
    Route::resource('distributions','DistributionController');
    Route::resource('products','ProductController');
    Route::resource('users','UserController');
    Route::resource('orders','OrderController');

    //Route::post('menu/many', 'MenuController@storeMany')->name('admin.menu.many');
    Route::resource('articles','ArticleController');
});

//Route pages của người dùng


//nhóm route xác thực người dùng
Route::get('/admin/login','LoginController@getLogin')->name('admin.login');
Route::post('/admin/login','LoginController@postLogin')->name('admin.loginpost');
Route::get('/admin/logout','AdminController@getLogout')->name('admin.logout');


//Route của người dùng sau khi đăng nhập
    Route::get('/','PageController@index')->name('pages.index');
    Route::get('list','PageController@getListPage')->name('pages.list.product');
    Route::get('category/{id}/{slug}.html','PageController@getCategory');
    Route::get('distribution/{id}/{slug}.html','PageController@getDistribution');
    Route::get('product/{id}','PageController@getProduct');
    Route::get('/account','PageController@getViewAccount')->name('pages.account');
    Route::get('article_single/{slug}','PageController@getArticleSingle')->name('pages.single');
    Route::get('/change-password','PageController@getChangePassword')->name('change.password');
    Route::post('/change-password','PageController@postChangePassword')->name('post.change.password');
    Route::get('/pages-order','PageController@getOrder')->name('pages.order');
    Route::get('/pages-orderdetail/{id}','PageController@getOrderDetail')->name('pages.orderDetail');

    //Route xác thực người dùng
    Route::get('login','LoginController@getLoginPage')->name('pages.get.login');
    Route::post('login','LoginController@postLoginPage')->name('pages.post.login');
    Route::get('logout','AdminController@getLogoutPage')->name('pages.logout');
    Route::post('regis','LoginController@postRegisPage')->name('pages.register');
    Route::get('/search','PageController@searchProduct')->name('customer.search');
    Route::post('/cart_ajax','CartController@addCartAjax')->name('cart.ajax');
    Route::post('/delete_ajax','CartController@deleteCartAjax')->name('delete.ajax');
    Route::get('/cart-detail','PageController@getCartAjax')->name('cart.detail');
    
    Route::post('/delete_ajax_one','CartController@deleteOneCartAjax')->name('web.cart.deleteone');

//'middeware' => 'customer',
Route::group(['prefix' => 'customer'],function(){
    Route::get('/cart','CartController@index')->name('customer.cart');
    Route::get('/add-cart/{id}','CartController@getAddtoCart')->name('customer.cart.add');
    Route::get('/delete-cart/{id}','CartController@deleteCart')->name('customer.cart.delete');
    Route::post('/create/order','CartController@createPostOrder')->name('create.post.order');
});
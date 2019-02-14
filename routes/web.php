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
//'middleware' => 'admincheck'
Route::group(['prefix' => 'admin'],function() {
    Route::resource('menus','MenuController');
    Route::resource('categories','CategoryController');
    Route::resource('distributions','DistributionController');
    Route::resource('products','ProductController');
    Route::resource('users','UserController');
    Route::resource('orders','OrderController');

    Route::post('menu/many', 'MenuController@storeMany')->name('admin.menu.many');
    Route::resource('articles','ArticleController');
    // Route::resource('question','QuestionController');
    // Route::resource('expert','ExpertController');
    // Route::resource('slide','SlideController');
    // Route::group(['prefix' => 'ajax'],function() {
    //     Route::get('category/{category_parent_id}','AjaxController@getCategory');
    // });
});

//Route pages của người dùng
Route::get('trangchu','PageController@index')->name('pages.index');
Route::get('list','PageController@getListPage')->name('pages.list.product');
Route::get('category/{id}/{slug}.html','PageController@getCategory');
Route::get('distribution/{id}/{slug}.html','PageController@getDistribution');
Route::get('product/{id}','PageController@getProduct');

//nhóm rout dẩy file lên driver
// Route::get('/drive', 'DriveController@getDrive'); // retreive folders
// Route::get('/drive/upload', 'DriveController@uploadFile'); // File upload form
// Route::post('/drive/upload', 'DriveController@uploadFile'); // Upload file to Drive from Form
// Route::get('/drive/create', 'DriveController@create'); // Upload file to Drive from Storage
// Route::get('/drive/delete/{id}', 'DriveController@deleteFile'); // Delete file or folder
//nhóm route xác thực người dùng
Route::get('/admin/login','AdminController@getLogin')->name('admin.login');
Route::post('/admin/login','AdminController@postLogin')->name('admin.loginpost');
Route::get('/admin/logout','AdminController@getLogout')->name('admin.logout');
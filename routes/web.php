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
//'middleware' => 'admincheck'
Route::group(['prefix' => 'admin'],function() {
    Route::resource('menus','MenuController');
    Route::resource('categories','CategoryController');
    Route::resource('distributions','DistributionController');
    Route::resource('products','ProductController');
    Route::resource('users','UserController');

    Route::post('import', 'CategoryController@import')->name('import');
    Route::resource('articles','ArticleController');
    // Route::resource('question','QuestionController');
    // Route::resource('expert','ExpertController');
    // Route::resource('slide','SlideController');
    // Route::group(['prefix' => 'ajax'],function() {
    //     Route::get('category/{category_parent_id}','AjaxController@getCategory');
    // });
});

// Route::get('/drive', 'DriveController@getDrive'); // retreive folders
 
// Route::get('/drive/upload', 'DriveController@uploadFile'); // File upload form
 
// Route::post('/drive/upload', 'DriveController@uploadFile'); // Upload file to Drive from Form
 
// Route::get('/drive/create', 'DriveController@create'); // Upload file to Drive from Storage
 
// Route::get('/drive/delete/{id}', 'DriveController@deleteFile'); // Delete file or folder
Route::get('/admin/login','AdminController@getLogin')->name('admin.login');
Route::post('/admin/login','AdminController@postLogin')->name('admin.loginpost');
Route::get('/admin/logout','AdminController@getLogout')->name('admin.logout');
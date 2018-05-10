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

Auth::routes();


Route::get('/', 'BlogController@index');
Route::get('/user/{id?}', 'BlogController@user')->name('user');
Route::get('/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/article/{slug?}', 'BlogController@article')->name('article');

Route::resource('/comment', 'CommentController');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function() {
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/articles', 'ArticleController', ['as' => 'admin']);
});
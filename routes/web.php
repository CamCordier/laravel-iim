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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('welcome');
});

Route::get('/post', function () {
    return view('post');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/article', 'ArticleController');

Route::get('/user', function() {
    return view('user');
});
Route::get('/admin', function() {
    return view('admin');
});

Route::resource('/comment','CommentController');

Route::resource('/contact','ContactController');

Route::get('product/like/{id}', ['as' => 'product.like', 'uses' => 'LikeController@likeProduct']);
Route::get('article/like/{id}', ['as' => 'article.like', 'uses' => 'LikeController@likeArticle']);
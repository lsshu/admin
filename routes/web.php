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

Route::get('/', 'Home\IndexController@index');
Route::get('article', 'Home\ArticleController@index');
Route::get('article_show', 'Home\ArticleController@show');
Route::get('wenzi', 'Home\ArticleController@wenzi');

Route::get('down', 'Home\DownController@index');
Route::get('down_show', 'Home\DownController@show');

Route::get('picture', 'Home\PictureController@index');
Route::get('pictures', 'Home\PictureController@pictures');
Route::get('picturesb', 'Home\PictureController@picturesb');
Route::get('picture_show', 'Home\PictureController@show');

Route::get('shop', 'Home\ShopController@index');
Route::get('shop_show', 'Home\ShopController@show');

Route::get('video', 'Home\VideoController@index');
Route::get('videos', 'Home\VideoController@videos');
Route::get('video_show', 'Home\VideoController@show');

Route::get('page', 'Home\PageController@page');
Route::get('contact', 'Home\PageController@contact');
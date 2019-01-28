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
//前台首页
Route::get('/','Home\IndexController@index');
//处理文章
Route::resource('/home/article','Home\ArticleController');
//添加评论
Route::any('/article/comment','Home\ArticleController@comment');
Route::any('/admin/index','Admin\IndexController@index');
Route::resource('/admin/user','Admin\UserController');

Route::get('/admin/article','Admin\ArticleController@show');

//文章分类
Route::resource('/admin/article/type','Admin\TypeController');

//添加子分类
Route::get('/admin/type/add/son','Admin\TypeController@typeson');

//ajax改变状态
Route::get('/admin/statusajax','Admin\TypeController@status');

//文章详情
Route::get('/admin/article/info','Admin\ArticleController@info');

//删除文章
Route::get('/admin/article/del','Admin\ArticleController@del');

//查看评论
Route::get('admin/comment/show','Admin\CommentController@show');
//删除评论
Route::get('/admin/comment/del','Admin\CommentController@del');
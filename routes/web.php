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



//后台的登录页面
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');

//验证码测试
Route::get('captch','Admin\LoginController@captch');


//后台的首页
Route::any('/admin/index','Admin\IndexController@index');
Route::resource('/admin/user','Admin\UserController');

//友情链接页面
Route::resource('/admin/link','Admin\LinkController');

//公告页面
Route::resource('/admin/tip','Admin\TipController');



// 前台首页
// Route::resource('/admin/')



	
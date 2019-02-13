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
//     return view('welcome');
// });

//后台的登录页面
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/dologin','Admin\LoginController@dologin');
//后台退出登录
Route::get('/admin/logout','Admin\LoginController@logout');

//验证码测试
Route::get('/captch','Admin\LoginController@captch');

//权限的提醒信息
Route::get('/admin/remind','Admin\UserController@remind');

Route::group(['middleware'=>['login','roleper']],function(){
	//后台的首页
	Route::any('/admin/index','Admin\IndexController@index');
	//后台的管理员操作
	Route::resource('/admin/user','Admin\UserController');
	Route::any('/admin/ajax','Admin\UserController@ajax');
	Route::get('/admin/userrole','Admin\UserController@userrole');
	Route::post('/admin/douserrole','Admin\UserController@douserrole');
	//角色管理
	Route::resource('/admin/role','Admin\RoleController');
	Route::get('/admin/roleper/{id}','Admin\RoleController@roleper');
	Route::post('/admin/doroleper/{id}','Admin\RoleController@doroleper');
	//权限管理
	Route::resource('/admin/permission','Admin\PermissionController');
	
	//修改账号密码
	Route::get('/admin/changepass/{id}','Admin\UserController@changepass');
	Route::post('/admin/dochangepass/{id}','Admin\UserController@dochangepass');
	//修改头像
	//修改已有头像
	Route::get('/admin/profile/{id}','Admin\UserController@profile');
	//修改未存在头像
	Route::get('/admin/profiles','Admin\UserController@profiles');
	Route::post('/admin/doprofile','Admin\UserController@doprofile');
	//轮播图管理
	Route::resource('/admin/banner','Admin\BannerController');
	Route::any('/admin/bannerajax','Admin\BannerController@ajax');
	//添加评论
	Route::any('/article/comment','Home\ArticleController@comment');

	
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

	//后台友情链接页面
	Route::resource('/admin/link','Admin\LinkController');
	//后台公告页面
	Route::resource('/admin/tip','Admin\TipController');
	//后台广告页面
	Route::resource('admin/advert','Admin\AdvertController');

});

//前台的注册
Route::get('/home/register','Home\RegController@index');
Route::post('/home/register/add','Home\RegController@add');
Route::get('/home/remind','Home\RegController@remind');
//前台的登录
Route::get('/home/login','Home\LoginController@login');
Route::post('/home/dologin','Home\LoginController@dologin');
//前台的退出
Route::get('/home/logout','Home\LoginController@logout');

//前台的个人中心
Route::resource('/home/center','Home\UserController');
//修改头像
//修改已有头像
Route::get('/home/profile/{id}','Home\UserController@profile');
//修改未存在头像
Route::get('/home/profiles','Home\UserController@profiles');
Route::post('/home/doprofile','Home\UserController@doprofile');
//修改密码
Route::get('/home/changepass/{id}','Home\UserController@changepass');
Route::post('/home/dochangepass/{id}','Home\UserController@dochangepass');
//修改邮箱
Route::get('/home/changemail/{id}','Home\UserController@changemail');
Route::post('/home/dochangemail/{id}','Home\UserController@dochangemail');
Route::get('/home/reminds','Home\UserController@reminds');


//激活提醒页面
// Route::get('/home/reminds','Home\RegController@reminds');



//前台首页
Route::get('/','Home\IndexController@index');
//处理文章
Route::resource('/home/article','Home\ArticleController');
//删除文章
Route::get('/article/del','Home\ArticleController@delete');
//添加文章时获取分类
Route::get('/homes/ajax','Home\ArticleController@ajax');

//前台文章管理
Route::resource('/home/type','Home\TypeController');

//前台文章分类管理

Route::resource('/home/arttype','Home\ArttypeController');

//前台ajax添加分类
Route::get('/home/doajax','Home\ArttypeController@doajax');

//前台查看所有文章
Route::any('/home/total','Home\ArticleController@total');
//前台评论删除
Route::any('/article/delcom','Home\ArticleController@delcom');
//我的博客

Route::get('/home/myblog','Home\ArticleController@myblog');







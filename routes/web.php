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





//验证码测试
Route::get('captch','Admin\LoginController@captch');



//友情链接页面
Route::resource('/admin/link','Admin\LinkController');

//公告页面
Route::resource('/admin/tip','Admin\TipController');







	

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

Route::group(['middleware'=>'login'],function(){
	//后台的首页
	Route::any('/admin/index','Admin\IndexController@index');
	//后台的管理员操作
	Route::resource('/admin/user','Admin\UserController');
	Route::any('/admin/ajax','Admin\UserController@ajax');
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
	// Route::any('/admin/index','Admin\IndexController@index');
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

});

//前台的注册
Route::get('/home/register','Home\RegController@index');
Route::post('/home/register/add','Home\RegController@add');
Route::get('/home/remind','Home\RegController@remind');
//前台的登录
Route::get('/home/login','Home\LoginController@login');
Route::post('/home/dologin','Home\LoginController@dologin');

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

//前台文章管理
Route::resource('/home/type','Home\TypeController');

//前台文章分类管理
Route::resource('home/arttype','Home\ArttypeController');
//前台文章分类
Route::get('home/arttype/del','Home\ArttypeController@del');


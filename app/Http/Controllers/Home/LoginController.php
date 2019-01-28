<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login',['title'=>'登录页面']);
    }

    public function dologin(Request $request)
    {
    	$res = $request->except('_csrf','_token','show_qr','login-button');
    	$username = $request->username;
    	$user = DB::table('user')->where('username',$username)->first();
    	$pass = $request->password;
    	// dd($res);
    	// dd($pass);
    	if(!$user){
    		alert('此用户名不存在');
    		return back();
    	}

    	//解密
    	if(!Hash::check($pass,$user->password)){
    		alert('用户名或密码不正确');
    		return back();
    	}

    	//存入session
    	session(['uid'=>$user->id]);
    	return view('welcome');
    }
}

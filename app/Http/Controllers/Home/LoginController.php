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
    	// dd($pass);
        if($user->status){
            return back()->with('error','你已被禁止登录!!');
        }
        
    	if(!$user){
    		return back()->with('error','用户名或密码不正确');
    	}

    	//解密
    	if(!Hash::check($pass,$user->password)){
    		return back()->with('error','用户名或密码不正确');
    	}

    	//存入session
    	session(['userid'=>$user->id]);
    	return redirect('/');
    }

    public function logout()
    {
        //清除session
        session(['userid'=>'']);
        return redirect('/');
    }
}

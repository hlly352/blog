<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use Mail;

class RegController extends Controller
{
    /**
     * 注册页面
     * 
     */
   	public function index()
   	{
   		return view('home.register.register',['title'=>'注册页面']);
   	}

   	public function add(Request $request)
   	{
   		//表单验证
   		$this->validate($request, [
            'username' => 'required|unique:user|regex:/^\w{2,10}$/',
            'password' => 'required|regex:/^\w{6,12}$/',
            'repassword' => 'same:password',
            'email' => 'email',
        ],[
            'username.required' => '用户名不能为空',
            'username.regex' => '用户名格式不正确',
            'username.unique' => '该用户名已存在',
            'password.required' => '密码不能为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' => '两次密码不一致',
            'email.email' => '邮箱格式不正确',
        ]);


   		$res = $request->except('_token','email','repassword');
   		$res['password'] = Hash::make($request->password);
   		$res['status'] = '1' ;
   		$res['level'] = '0' ;
   		$res['addtime'] = time();
   		$res['token'] = str_random(32);
   		$data = DB::table('user')->insertGetId($res);
   		//加密
   		$baseid = base64_encode($data);

   		if($data){
   			//往userinfo表里添加邮箱
   			$email['email'] = $request->email;
   			$email['uid'] = $data;
   			$rs = DB::table('userinfo')->insert($email);
   			if($rs){  				
	   			//发送邮件
	   			Mail::send('home.register.remind', ['uname'=>$res,'id'=>$baseid,'token'=>$res['token']], function ($m) use ($res,$email) {
		            $m->from(env('MAIL_USERNAME'), '二郎巷博客');
		            $m->to($email['email'], $res['username'])->subject('激活信息!');
	        	});
	        	return view('home.register.reminds',['title'=>'邮件激活']);
   			}else{
   				return back()->with('error','激活失败');
   			}
   		}else{
   			return back()->with('error','注册失败');
   		}

   	}

   	/**
     *  处理激活的邮件
     *
     *  @return \Illuminate\Http\Response
     */
   	public function remind(Request $request)
   	{
   		//获取id  解密
   		$ids = base64_decode($request->id);

   		//根据id查询数据 作对比  token
   		$data = DB::table('user')->where('id',$ids)->first();
   		// dump($request->token);
   		// dump($data->token);die;
   		if($data->token != $request->token){
   			echo '激活失败';die;
   		}
   		$res = [];
   		//把状态的1改成0
    	$res['status'] = '0';
    	$rs = DB::table('user')->where('id', $ids)->update($res);
    	if($rs){
    		return redirect('/home/login');
    	} else {
    		return back();
    	}
   		
   	}

   	/**
   	 * 邮箱激活页面显示
   	 * 
   	 */
   	public function reminds()
   	{
   		return view('home.register.reminds',['title'=>'邮箱激活页面显示']);
   	}
    
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

use Gregwar\Captcha\PhraseBuilder; 
use DB;

use Hash;

class LoginController extends Controller
{

	/**
	 * 管理员登录页面
	 * 
	 * @return [type] [description]
	 */
    public function login()
    {
    	return view('admin.login',['title'=>'登录']);
    }

    /**
     * 处理登录方法
     *
     * @return
     */
    public function dologin(Request $request)
    {
    	//表单验证
    	$this->validate($request, [
            'password' => 'required',
        ],[
            'password.required' => '密码不能为空',
        ]);
    	//获取账号
    	$uname = $request->username;
    	//通过账号查找数据库里面有没有
    	$res = DB::table('user')->where('username',$uname)->first();
        // dd($res->level);
        if($res->level < 2 || $res->status == 1){
            return back()->with('error','你没有登录后台的权限');
        }
        
    	if(!$res){
    		return back()->with('error','用户名或密码不正确');
    	}
    	//获取密码
    	$pass = $request->password;
    	//检测 解密  hash解密
    	if(!Hash::check($pass,$res->password)){
    		return back()->with('error','用户名或密码不正确');
    	}
    	//获取验证码
    	$vcode = $request->vcode;
    	//获取session里面存储的code
    	$code = session('code');
    	if($vcode != $code){
    		return back()->with('error','验证码不正确');
    	}
    	//存储session
    	session(['uid'=>$res->id]);
    	//跳转后台首页
    	return redirect('/admin/index')->with('success','登录成功');
    }

    /**
     * 退出登录
     * 
     */
    public function logout()
    {
    	//清空session
    	session(['uid'=>'']);

    	return redirect('/admin/login');
    }

    /**
     * 验证码
     * 
     */
    public function captch()
    {

    	$phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }
}

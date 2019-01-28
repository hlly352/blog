<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\User;
use DB;
use Hash;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = session('uid');
        $user = User::find($id);
        $info = User::find($id)->infos;
        // dump($user);
        // dump($info);
        return view('home.user.center',['title'=>'个人中心','user'=>$user,'info'=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res = DB::table('userinfo')->where('id',$id)->first();
        $user = DB::table('user')->where('id',$res->uid)->first();
        return view('home.user.editcenter',['title'=>'修改个人中心','res'=>$res,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $res = $request->except('_token','_method','workIndex','eduIndex','_csrf');
        $data = DB::table('userinfo')->where('id',$id)->update($res);
        if($data){
            return back()->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 修改头像
     * 
     */
    public function profile($id)
    {
        $res = DB::table('userinfo')->where('id',$id)->first();
        return view('home.user.profile',['title'=>'修改头像','res'=>$res,'profile'=>$res->profile]);
    }

    public function profiles()
    {
        $img = '/uploads/profile.jpg';
        return view('admin.user.profile',['title'=>'修改头像','profile'=>$img]);
    }

    /**
     *修改头像的方法
     * 
     */
    public function doprofile(Request $request)
    {
        //获取上传的文件对象
        // $file = Input::file('file_upload');
        $file = $request->file('profile');
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //新的文件名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            $path = $file->move('./uploads/home',$newName);
            $filepath = '/uploads/home/'.$newName;
            //返回文件的路径
            echo $filepath;
        }

        $rs['profile'] = $filepath;
        $res = DB::table('userinfo')->where('uid',8)->first();
        if($res){
            //删除原来的头像
            //unlink($res->profile);
            DB::table('userinfo')->where('uid',8)->update($rs);            
        } else {
            $info['uid'] = 8;
            $info['profile'] = $filepath;
            DB::table('userinfo')->insert($info);            
        }
    }

    /**
     * 修改密码
     * 
     */
    public function changepass($id)
    {
        return view('home.user.changepass',['title'=>'修改密码']);
    }

    /**
     * 修改密码的方法
     * 
     */
    public function dochangepass(Request $request)
    {
        // //表单验证
        $this->validate($request, [
            'password' => 'required|regex:/\w{6,12}/',
            'repassword' => 'same:password',
        ],[
            'password.required' => '密码不能为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' => '两次密码不一致',
        ]);

        //获取旧密码
        $id = $request->id;
        $pass = $request->oldpass;
        $res = User::find($id);
        if(!Hash::check($pass,$res->password)){
            return back()->with('error','输入的旧密码不正确');
        }

        //获取新密码
        $newpass = $request->password;
        //加密  hash
        $arr = [];
        $arr['password'] = Hash::make($newpass);
        $data = User::where('id',$id)->update($arr);
        if($data){
            session(['uid'=>'']);
            return redirect('/home/login');
        }       
    }

    /**
     * 修改绑定邮箱
     * 
     */
    public function changemail($id)
    {
        return view('home.user.changemail',['title'=>'修改邮箱']);
    }

    /**
     * 修改邮箱的方法
     * 
     */
    public function dochangemail(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'email' => 'email',
        ],[
            'email.email' => '邮箱格式不正确',
        ]);

        $id = $request->id;
        $res = User::find($id);
        // dd($res);
        //给id加密
        $baseid = base64_encode($id);
        //给email加密
        $email = $request->email;
        $baseemail = base64_encode($email);
        
        //发送邮件
        Mail::send('home.user.remind', ['uname'=>$res,'id'=>$baseid,'email'=>$baseemail], function ($m) use ($res,$email) {
            $m->from(env('MAIL_USERNAME'), '二郎巷博客');
            $m->to($email, $res['username'])->subject('激活信息!');
        });
        return view('home.register.reminds',['title'=>'邮件激活']);
    }

    /**
     *  处理激活的邮件
     *
     *  @return \Illuminate\Http\Response
     */
    public function reminds(Request $request)
    {
        // echo  111;
        //获取id  解密
        $ids = base64_decode($request->id);
        //获取email  解密
        $email = base64_decode($request->email);
        // dd($ids,$email);
        // 把邮箱修改为要修改的邮箱
        $res = [];
        $res['email'] = $email;
        $data = DB::table('userinfo')->where('uid',$ids)->update($res);
        if($data){
            return redirect('/home/center')->with('success','修改成功');
        } else {
            return back()->with('激活失败');
        }
        
    }
}

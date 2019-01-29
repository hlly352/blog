<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\User;
use App\Http\Requests\FormsRequest;
use Hash;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        //获取表单传过来的数据

        $user = User::
        where('username','like','%'.$request->username.'%')->paginate($request->input('nums',10));
        $id = 1;
        // dump($user);
        return view('admin.user.index',['title'=>'用户列表','user'=>$user,'id'=>$id,'request'=>$request]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add',['title'=>'用户添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(FormsRequest $request)
    {
        //获取数据
        $rs = $request->except('_token','repassword');
        //密码加密  hash加密
        $rs['password'] = Hash::make($request->password);
        //添加数据
        $rs['addtime'] = time();
        $rs['token'] = str_random(32);
        try {
            $data = User::create($rs);
            if($data){
                return redirect('/admin/user');
            }
        } catch (\Exception $e) {
            return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $res = User::find($id)->infos;
        // dump($res);
        $user = User::find($id);
        if(!$res){
            return back()->with('error','没有信息');
        }
        // dump($user);
        return view('admin.user.detail',['title'=>'用户详情','res'=>$res,'user'=>$user]);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $res = User::find($id);
        // dump($res);
        return view('admin.user.edit',['title'=>'用户的修改','res'=>$res]);


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


        //表单验证

        $res = $request->except('_token','_method');
        try {
            $data = User::where('id',$id)->update($res);
            if($data){
                return redirect('/admin/user');
            }
        } catch (\Exception $e) {
            return back();
        }
        // dump($res);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        try {
            $data = User::find($id);
            $data->delete();
            $res = $data->infos()->delete();
            if($res){
                return redirect('/admin/user');
            } 
        } catch (Exception $e) {
            return back();
        }
    }

    /**
     * ajax改变状态
     * 
     */
    public function ajax()
    {
        // dump($_GET);
        $status = $_GET['status'];
        $id = $_GET['id'];
        if($status == '开启'){
            $status = '1';
        }
        if($status == '禁用'){
            $status = '0';
        }
        $res = [];
        $res['status'] = $status;

        $rs = User::where('id',$id)->update($res);
                
    }

    /**
     * 修改密码
     * 
     */
    public function changepass($id)
    {
        return view('admin.user.changepass',['title'=>'修改账号密码','id'=>$id]);
    }

    /**
     * 修改密码的方法
     * 
     */
    public function dochangepass(Request $request,$id)
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
        $pass = $request->oldpass;
        $res = DB::table('user')->where('id',$id)->first();
        if(!Hash::check($pass,$res->password)){
            return back()->with('error','输入的旧密码不正确');
        }

        //获取输入的新密码
        $newpass = $request->password;
        $arr = [];
        //加密  hash
        $arr['password'] = Hash::make($newpass);
        $data = User::where('id',$id)->update($arr);
        if($data){
            session(['uid'=>'']);
            return redirect('/admin/login');
        }
        // dump($res);
    }

    /**
     * 修改头像
     * 
     */
    public function profile($id)
    {
        $img = DB::table('userinfo')->where('id',$id)->first();
        return view('admin.user.profile',['title'=>'修改头像','profile'=>$img->profile]);
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
            $path = $file->move('./uploads/admin',$newName);
            $filepath = '/uploads/admin/'.$newName;
            //返回文件的路径
            echo $filepath;
        }

        $rs['profile'] = $filepath;
        $res = DB::table('userinfo')->where('uid',session('uid'))->first();
        if($res){
            //删除原来的头像
            //unlink($res->profile);
            DB::table('userinfo')->where('uid',session('uid'))->update($rs);            
        } else {
            $info['uid'] = session('uid');
            $info['profile'] = $filepath;
            DB::table('userinfo')->insert($info);            
        }


    }
}

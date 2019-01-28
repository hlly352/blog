<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\User;
use DB;

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
        return view('home.user.center',['title'=>'个人中心']);
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
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BannerController extends Controller
{
    /**
     * 浏览轮播图.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banner = DB::table('banner')->paginate(5);
        $id = 1;
        // dump($banner);
        return view('admin.banner.banner',['title'=>'浏览轮播图','banner'=>$banner,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.add',['title'=>'添加轮播图']);
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
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required|url'
        ],[
            'title.required' => '标题不能为空',
            'link.required' => '地址不能为空',
            'link.url' => '地址格式不正确',
        ]);

        $res = $request->except('_token','pic');
        //判断是否有图片上传
        if(!$request->hasFile('pic')){
            return redirect('/admin/banner/create')->with('error','没有选择图片上传');
        } else {
            $file = $request->file('pic');
            //设置名字
            $name = rand(1111,9999).time();
            //获取后缀
            $suffix = $file->getClientOriginalExtension();
            //移动文件
            $file->move('./uploads/banner', $name.'.'.$suffix);
            //存到数据库
            $res['pic'] = '/uploads/banner/'.$name.'.'.$suffix;
        }
        //添加数据
        try{
            //添加
            $data = DB::table('banner')->insert($res);
            if($data){
                return redirect('/admin/banner')->with('success','添加成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加失败');
        }
        // dump($res);
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
        // dump($id);
        $res = DB::table('banner')->where('id',$id)->first();
        // dump($res);
        return view('admin.banner.edit',['title'=>'轮播图修改','res'=>$res]);
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
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required|url'
        ],[
            'title.required' => '标题不能为空',
            'link.required' => '地址不能为空',
            'link.url' => '地址格式不正确',
        ]);

        $res = $request->except('_token','_method');
        // dump($request->);

        //判断是否修改图片
        if(!$request->hasFile('pic')){
            //直接修改数据
            $data = DB::table('banner')->where('id',$id)->update($res);
            if($data){
                return redirect('/admin/banner')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        } else {
            //删除之前的图片
            unlink($request->pic);
            $file = $request->file('pic');
            //设置名字
            $name = rand(1111,9999).time();
            //获取后缀
            $suffix = $file->getClientOriginalExtension();
            //移动文件
            $file->move('./uploads/banner', $name.'.'.$suffix);
            //存到数据库
            $res['pic'] = '/uploads/banner/'.$name.'.'.$suffix;
            //添加数据
            try{
                //添加
                $data = DB::table('banner')->where('id',$id)->update($res);
                if($data){
                    return redirect('/admin/banner')->with('success','修改成功');
                }
            }catch(\Exception $e){
                return back()->with('error','修改失败');
            }
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
        //
        // dump($id);
        try{
            //删除
            $data = DB::table('banner')->where('id',$id)->delete();
            if($data){
                return redirect('/admin/banner')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
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
        if($status == '显示'){
            $status = '1';
        }
        if($status == '隐藏'){
            $status = '0';
        }
        $res = [];
        $res['status'] = $status;

        $rs = DB::table('banner')->where('id',$id)->update($res);
                
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Advert;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //后台广告页面
        
        $res = Advert::all();
        return view('admin.advert.advert',[
            'title'=>'后台广告链接',
            'res'=>$res
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //后台广告链接添加
        return view('admin.advert.doadvert',['title'=>'后台广告链接添加']);

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
        $res = $request->except(['_token','profile']);
        
        //图片上传

        if(!$request->hasFile('profile')){

            echo '没有选择文件上传';die;
        } else {

        $file = $request->file('profile');

        //设置名字
        $name = rand(1111,9999).time();

       //获取后缀
        $suffix = $file->getClientOriginalExtension();

        //移动文件
        $file->move('./uploads/advert/', $name.'.'.$suffix);

        //存到数据库
        $res['profile'] = '/uploads/advert/'.$name.'.'.$suffix;

    }

         try{
        
        //添加
        $data = Advert::create($res);

        }catch(\Exception $e){

            return back();
        }
        return redirect('/admin/advert');

    }
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
        //后台广告修改
        
       $res = Advert::find($id);
       return view('admin.advert.updateadvert',[
        'title'=>'后台友情链接修改',
        'res'=>$res

        ]);
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
        $res = $request->except(['_token','profile','_method']);
       
        //图片上传

        if(!$request->hasFile('profile')){

            echo '没有选择文件上传';die;
        } else {

        $file = $request->file('profile');

        //设置名字
        $name = rand(1111,9999).time();

       //获取后缀
        $suffix = $file->getClientOriginalExtension();

        //移动文件
        $file->move('./uploads/advert/', $name.'.'.$suffix);

        //存到数据库
        $res['profile'] = '/uploads/advert/'.$name.'.'.$suffix;

    }
    
       //修改数据
        try{

        //添加
        Advert::where('id', $id)->update($res);

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
         return redirect('/admin/advert')->with('success','修改成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = Advert::destroy($id);

        try{
            Advert::destroy($id);
        
        } catch(\Exception $e){

            return back();
        }
            return redirect('/admin/advert');

    }
}

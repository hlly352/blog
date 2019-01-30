<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Home\Clas;
use App\Model\Home\User;




class ArttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查找分类信息
        $id = session('userid');
                                    
        // $rs = Article::where('uid',$id)->get();
        // //接受分类名
        // $info = [];

        // foreach($rs as $k=>$v){
        //     $info[] = $v->person;
        // }

        // $types = array_unique($info);
        $types = Clas::where('uid',$id)->get();
        $i = 1;
        return view('home.arttype.index',['title'=>'分类管理页面','types'=>$types,'i'=>$i]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        //获取用户id
        $uid = session('userid');
       
        //把分类名改为未分类
        Clas::where('uid',$uid)->where('name',$id)->delete();
        
        return back();
    }
    //ajax添加分类
    public function doajax()
    {
        $uid = session('userid');
        //删除当前用户的分类
        $rs = Clas::where('uid',$uid)->delete();

        //把数据接受到的类名添加表数据库中
        $user = User::find($uid);
        
         $info = [];

         $cla = $_GET['clas'];

        foreach($cla as $k=>$v){
            $res['name'] = $v;
            $res['uid'] = $uid;
            $info[] = $res;
        }

         $data = $user->clas()->createMany($info);
         echo $data;
        
    }
}

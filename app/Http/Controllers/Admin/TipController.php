<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Tip;


class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //公告显示
        //
        $res = tip::all();

        return view('admin.tip.tip',[
            'title'=>'后台公告链接',
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
        //后台公告链接添加
         return view('admin.tip.dotip',['title'=>'后台公告链接添加']);



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
        $res = $request->except("_token");
        $res['addtime'] = time();
       
       
        try{
            Tip::create($res);
        
        } catch(\Exception $e){

             return back();
        }
            return redirect('/admin/tip');

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
         $res = Tip::find($id);
         return view('admin.tip.updatetip',[
        'title'=>'后台公告修改',
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

        $res = $request->only('title','content','status');

       //修改数据
        try{

        //添加
        Tip::where('id', $id)->update($res);

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
         return redirect('/admin/tip')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = Tip::destroy($id);

        try{
            Tip::destroy($id);
        
        } catch(\Exception $e){

            return back();
        }
            return redirect('/admin/tip');

    }   
}

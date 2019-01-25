<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Link;

class LinkController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //后台友情链接
      
        $res = link::all();
       
        return view('admin.link.link',[
            'title'=>'后台友情链接',
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
        //后台友情链接添加
         return view('admin.link.dolink',['title'=>'后台友情链接添加']);

        
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
  
       
        try{
            Link::create($res);
        
        } catch(\Exception $e){

             return back();
        }
            return redirect('/admin/link');

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
       //后台友情链接修改
    
       $res = Link::find($id);
       return view('admin.link.updatelink',[
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
        $res = $request->except("_token",'_method');

       //修改数据
        try{

            //添加
             Link::where('id', $id)->update($res);

            
          
               
          

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
         return redirect('/admin/link')->with('success','修改成功');

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
        $rs = Link::destroy($id);

        try{
            Link::destroy($id);
        
        } catch(\Exception $e){

            return back();
        }
            return redirect('/admin/link');

    }
}

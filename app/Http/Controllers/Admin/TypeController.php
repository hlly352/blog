<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //判断是否有是子分类
      if($request->pid){
        $pid = $request->pid;
      }else{
        $pid = 0;
      }
      
      //查询分类信息
      // dump($request->name);exit;
      
      $rs = Type::where('pid',$pid)->where('name','like','%'.$request->name.'%')->paginate($request->input('nums',3));

      $i = 1;
      return view('admin.type.index',['title'=>'浏览分类','rs'=>$rs,'i'=>$i,'request'=>$request]);
    }

    //添加分类方法
    public function create()
    {
        

        return view('admin.type.add',['title'=>"添加分类"]);
    }

    //存储分类信息
    public function store(Request $request)
    {
        //处理添加数据
        
        if(empty($request->pid)){
            $rs['pid'] = 0;
            $rs['path'] = '0,';
            
        }else{
            $rs['pid'] = $request->pid;
            $rs['path'] = $request->path;

        }
        $rs['name'] = $request->name;
        $rs['status'] = $request->status;
        //闪存
        $request->flashOnly('name');
        //存储信息
        try{
             Type::create($rs);
            
        }catch(\Exception $e){
            return back()->withInput();
        }
        return redirect('/admin/article/type')->with('success','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.list',compact('user'));
    }

    //修改方法
    public function edit($id)
    {
        
       //通过id得到数据
        $rs = Type::where('id',$id)->first();

        return view('admin.type.edit',['title'=>'修改分类','rs'=>$rs]);

    }

    //更新方法
    public function update(Request $request, $id)
    {
        //获取数据
        $rs = Type::where('id',$id)->first();
        $arr = [];

        $arr['pid'] = $rs->pid;
        $arr['path'] = $rs->path;
        $arr['name'] = $request->name;
        $arr['status'] = $request->status;
        
        //更新数据
        try{
            Type::where('id',$id)->update($arr);
        }catch(\Exception $e){
            return back()->with('error','修改失败');
        }
        return redirect('/admin/article/type')->with('success','修改成功');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  删除分类方法
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //通过id判断此分类是否有子分类
        $rs = Type::where('pid',$id)->get();

        if(!$rs){
            return redirect()->back()->with('success','此分类还有子分类,无法删除');
        }
        try{
        Type::destroy($id);
            }catch(\Exception $e){
                return back()->with('error','删除失败');
            }
        return back()->with('success','删除成功');
        
        
    }
    //添加子分类方法
    public function typeson(Request $request)
    {
        //接受id作为新添加分类的pid
        $rs['pid'] = $request->input('id');

        //通过id查询数据获取path
        $res = Type::where('id',$request->input('id'))->select('path','id')->first();

        $rs['path'] = $res->path.$res->id.',';

        //跳转到添加页面
        return view('admin.type.add',['rs'=>$rs,'title'=>'添加子分类']);


    }
    //ajax改变状态方法
    public function status()
    {
        //接受状态值
        $status = $_GET['status'];
        $id = $_GET['id'];
        //查找状态
        $rs = Type::where('id',$id)->first();

        
         if($status == "开启"){
             $status = '1';
         }else{
             $status = '0';
         }
        
         $arr['pid'] = $rs->pid;
         $arr['path'] = $rs->path;
         $arr['status'] = $status;
         
         //更改状态
         $result = Type::where('id',$id)->update($arr);
         if($result){
            echo 1;
         }else{
            echo 0;
         }

    }
}

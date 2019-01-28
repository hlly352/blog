<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Admin\Type;
use App\Model\Admin\User;

class TypeController extends Controller
{
    //显示分类信息
    public function index()
    {

        //查找当前用户的自由分类
        $rs = Article::where('uid',3)->get();
        //申明数组用于填充文章类
     

        return view('home.type.index',['title'=>'博客管理','rs'=>$rs]);
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

    //编辑文章方法
    public function edit($id)
    {
        //查找要修改的文章信息
        $art = Article::where('id',$id)->first();
        //文章所有分类
        $rs = Type::get();
        //查询文章的一二级分类
        $first = Type::where('pid','0')->first();
        $twice = Type::where('id',$art->type_id)->first();
       
      
        return view('home.type.edit',['title'=>'修改文章','art'=>$art,'first'=>$first,'twice'=>$twice,'rs'=>$rs]);
    }

    //修改文章方法
    public function update(Request $request, $id)
    {
        //获取需要的值
        $rs = $request->only('title','keywords','description');
        $rs['type_id'] = $request->input('twice');
        $rs['person'] = $request->input('person','0');
        $rs['addtime'] = time();
        $rs['uid'] = 3;
        $rs['contents'] = $request->input('editorValue');
        $rs['author'] = User::where('id',$rs['uid'])->first()->username;

        try{
            Article::where('id',$id)->update($rs);
            
        } catch(\Exception $e) {
            return back();
        }
        return redirect('/home/type');
    }

    //删除文章方法
    public function destroy($id)
    {
        
        try{
            $rs = Article::find($id);
            $rs->delete();
            $rs->artinfo()->delete();
            
        } catch(\Exception $e) {
            return back();
        }
        return back();
        
    }
}

<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Admin\Type;
use App\Model\Admin\User;
use App\Model\Home\Clas;

class TypeController extends Controller
{
    //显示分类信息
    public function index(Request $request)
    {

        //查找当前用户的自有分类
        $rs = Article::where('uid',session('userid'))->where('title','like','%'.$request->name.'%')->paginate(1);

        $i = 1;
        //缓存搜索条件
        $name = $request->name;

        //申明数组用于填充文章类

        return view('home.type.index',['title'=>'博客管理','rs'=>$rs,'i'=>$i,'name'=>$name,'request'=>$request]);
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

      
        
         //从数据库中取出分类
        $rs = Type::get();
        //查找个人分类
        $mytype = Clas::where('uid',session('userid'))->get();
       
       
        return view('home.type.edit',['title'=>'修改文章','art'=>$art,'mytype'=>$mytype,'rs'=>$rs]);
    }

    //修改文章方法
    public function update(Request $request, $id)
    {
        //获取需要的值
        $rs = $request->only('title','keywords','description');
        $rs['type_id'] = $request->input('twice');
        $rs['person'] = $request->input('other','0');
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

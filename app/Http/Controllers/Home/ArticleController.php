<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;
use App\Model\Admin\User;
use App\Model\Admin\Article;
use App\Model\Admin\Comment;


class ArticleController extends Controller
{
    //显示文章方法
    public function index()
    {
        //查找文章
       

        return redirect('/');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //从数据库中取出分类
        $rs = Type::get();

        return view('home.article.add',['title'=>'写文章','rs'=>$rs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取需要的值
        $rs = $request->only('title','keywords','description');
        $rs['type_id'] = $request->input('twice');
        $rs['person'] = $request->input('person','无个人分类');
        $rs['addtime'] = time();
        $rs['uid'] = 1;
        $rs['contents'] = $request->input('editorValue');
        $rs['author'] = User::where('id',$rs['uid'])->first()->username;
     
      //添加文章
            
    try{
      
             $res = Article::create($rs);
             $id = $res->id;
             $info['art_id'] = $id;
             $data = Article::find($id); 
             $data->artinfo()->insert($info);

        }catch(\Exception $e){
            $request->flash();
            return back()->with('error','添加失败')->withInput();
        }
            return redirect('/home/article')->with('success','添加成功');
    }

    //显示文章内容方法
    public function show(Request $request, $id)
    {
       
        //通过id查找文章内容
        // $rs = Article::with('artinfo')->where('id',$id)->first();
        $rs = Article::where('id',$id)->first();
        $read = $request->read;
        $comment = $request->comment;
        //查询评论表
        $info = Comment::where('art_id',$id)->orderBy('addtime','desc')->get();
        $i = 1;
        $users = getAuthor(1);

        return view('home.article.index',['title'=>$rs->title,'rs'=>$rs,'read'=>$read,'comment'=>$comment,'info'=>$info,'i'=>$i,'users'=>$users]);
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
        //
    }

    //添加评论方法
    public function comment(){
        //接收数据
        $rs['content'] = $_GET['mes'];
        $rs['art_id'] = $_GET['id'];
        $rs['uid'] = 1;
        $rs['addtime'] = time();
        //添加评论
        try{
            Comment::create($rs);
        } catch(\Exception $e) {
            echo 0; return;
        }

        echo 1;
     }
}

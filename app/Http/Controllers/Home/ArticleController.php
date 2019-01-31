<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;
use App\Model\Admin\User;
use App\Model\Admin\Article;
use App\Model\Admin\Comment;
use App\Model\Home\Clas;
use DB;

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
        $rs['addtime'] = time();
        $uid = session('userid');
        $rs['uid'] = $uid;
        $rs['author'] = User::where('id',$uid)->first()->username;
        $rs['contents'] = $request->input('editorValue');
        $clasname = $request->input('person');
        //通过类名查询类名数据库中是否已经存在该类名
        
        try{
            $classid = Clas::where('name',$clasname)->first()->id;
            } catch(\Exception $e) {

                //向文章分类表中添加分类名
                
                if($clasname != null){
                    $data = \DB::table('clas')->insertGetId(['uid'=>$uid,'name'=>$clasname]);
                                }
                     //判断分类表中是否插入数据
                if(isset($data)){
                    $rs['person'] = $data;
                }else{
                    $rs['person'] = '0';
                }
                
            }
            //如果没有文章表中没有文章类名时,把类名表中查到的类名id赋值给文章person
            if(!isset($rs['person'])){
                 $rs['person'] = $classid;
                }
                
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
        // dump($request->all());
        $rs = Article::where('id',$id)->first();
        $read = $request->read;
        $comment = $request->comment;
        //查询评论表
        $info = Comment::where('art_id',$id)->orderBy('addtime','desc')->get();
        // dump($id);
        // dump($info);
        $num = 0;
        foreach($info as $k=>$v){
            // dump($v->art_id);
            $num++;
        }
        // dump($num);
        
        $i = 1;
        $users = getAuthor($rs->uid);
        $img = DB::table('userinfo')->where('uid',$rs->uid)->first()->profile;
        // dump($img);
        $userid = session('userid');
        $profile = DB::table('userinfo')->where('uid',$userid)->first()->profile;
        return view('home.article.index',['title'=>$rs->title,'rs'=>$rs,'read'=>$read,'comment'=>$comment,'info'=>$info,'i'=>$i,'users'=>$users,'img'=>$img,'profile'=>$profile,'num'=>$num]);
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
        $rs['uid'] = session('userid');
        $rs['addtime'] = time();
        //添加评论
        try{
            Comment::create($rs);
        } catch(\Exception $e) {
            echo 0; return;
        }

        echo 1;
     }
     //前台查看所有文章方法
     public function total(Request $request)
     {


        //查找文章的一级分类
        $types = Type::where('pid','0')->get();
        $info = [];
        foreach($types as $k=>$v){
            $info[$v->id] = $v->name;
            //通过一级分类的id查找二级分类的类名                                                                     
            $s_types = Type::where('pid',$v->id)->get();
            $t_type = [];
            foreach($s_types as $ks=>$vs){
                $t_type[] = Type::where('id',$vs->id)->first()->name;
            }

            $info[] = $t_type;
        }
        
        dump($info);exit;
        dump($types);exit;


        //从数据库读取所有文章
     
        $rs = Article::where('pid','like','%'.$request->pid.'%')->paginate(6);
        
        return view('home.article.total',['rs'=>$rs,'title'=>'博客列表页','types'=>$types]);
     }

     //我的博客方法
     public function myblog(Request $request)
     {
        $data = $request->person;
        //通过分类名查询类名的id
        try{
            $person = Clas::where('name',$data)->first()->id;
        } catch(\Exception $e) {
            $person = '';
        }
        //查找当前用户的所有文章
        $uid = session('userid');
        //查找当前用户名
        $username = getAuthor($uid);
        $rs = Article::with('artinfo')->where('person','like','%'.$person.'%')->where('uid',$uid)->get();


        //查找个人的分类
        $mytype = Clas::where('uid',$uid)->get();

      
        return view('home.article.myblog',['rs'=>$rs,'mytype'=>$mytype,'title'=>$username.'的博客']);
     }

     //删除评论的方法
     public function delcom()
     {
        $comid =  $_GET['comid'];
        //删除评论
        $data = Comment::destroy($comid);
        if($data){
            return 1;
        } else {
            return 0;
        }
        
     }
}

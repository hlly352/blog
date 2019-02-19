<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;
use App\Model\Admin\User;
use App\Model\Admin\Article;
use App\Model\Admin\Art_info;
use App\Model\Admin\Comment;
use App\Model\Home\Clas;
use App\Model\Home\Userinfo;
use DB;


class PubartController extends Controller
{
    //显示作者的所有文章方法
    public function index(Request $request)
    {
        
        //获取作者的id和搜索条件
        $uid = $request->uid;
        $data = $request->person;
        //通过分类名查询类名的id
        try{
            $person = Clas::where('name',$data)->first()->id;
        } catch(\Exception $e) {
            $person = '';
        }
        //查找当前用户名
        $username = getAuthor($uid);

        $rs = Article::with('artinfo')->where('person','like','%'.$person.'%')->where('uid',$uid)->paginate(10);


        //查找个人的分类
        $mytype = Clas::where('uid',$uid)->get();
        //查找用户头像
        $img = Userinfo::where('uid',$uid)->first()->profile;
        $art = \DB::table('article')->where('uid',$uid)->get();

        return view('home.article.personal_blog',['rs'=>$rs,'mytype'=>$mytype,'title'=>$username.'的博客','img'=>$img,'art'=>$art,'authorid'=>$uid]);
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

      //前台查看所有文章方法
     public function total(Request $request)
     {


        //查找文章的一级分类
        $types = Type::where('pid','0')->where('status','0')->get();
        $info = [];
        foreach($types as $k=>$v){
            $info[$v->id][] = $v->name;
            //通过一级分类的id查找二级分类的类名                                                                     
            $s_types = Type::where('pid',$v->id)->get();
            $t_type = [];
            foreach($s_types as $ks=>$vs){
                $t_type[$vs->id] = Type::where('id',$vs->id)->first()->name;
            }

            $info[$v->id][] = $t_type;
        }
        if(isset($request->pid)){

            $data = Type::where('id',$request->pid)->first()->pid;
        
        //判断得到的id是否是顶级分类
        $pids = [];
        if($data == 0){
            $mypid = Type::where('pid',$request->pid)->get();
            //获取子分类的id
            foreach($mypid as $k=>$v){
                $pids[] = $v->id;
            }
        } else {
          
                $pids[] = $request->pid;
            
        }
        
     } else {
        $pids = [];
        //查处所有的文章分类id
        $type_ids = Article::get();
        foreach($type_ids as $k=>$v){
            $pids[] = $v->type_id;
        }
     } 

        //从数据库读取所有文章
        
        $rs = \DB::table('article')->join('art_info','article.id','=','art_info.art_id')->select('*')->whereIn('type_id',$pids)->orderBy('read_num','desc')->limit(8)->paginate(6);
        
        return view('home.article.total',['rs'=>$rs,'title'=>'博客列表页','info'=>$info]);
     }
        //阅读量的方法
     public function reads()
     {
        $artid = $_GET['artid'];
        $artinfo = DB::table('art_info')->where('art_id',$artid)->first();
        // dump($artinfo->read_num);
        $read['read_num'] = $artinfo->read_num + 1 ;
        // dump($read);
        $data = DB::table('art_info')->where('art_id',$artid)->update($read);
        if($data){
            return 1;
        } else {
            return 0;
        }
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
        
        $num = 0;
        foreach($info as $k=>$v){
            // dump($v->art_id);
            $num++;
        }

        
        $i = 1;

        $users = getAuthor($rs->uid);
        $img = DB::table('userinfo')->where('uid',$rs->uid)->first()->profile;
        // dump($img);
        if(session('userid')){     
            $userid = session('userid');
            $profile = DB::table('userinfo')->where('uid',$userid)->first()->profile;
            return view('home.article.index',['title'=>$rs->title,'rs'=>$rs,'read'=>$read,'comment'=>$comment,'info'=>$info,'i'=>$i,'users'=>$users,'img'=>$img,'profile'=>$profile,'num'=>$num]);
        }else{
            return view('home.article.index',['title'=>$rs->title,'rs'=>$rs,'read'=>$read,'comment'=>$comment,'info'=>$info,'i'=>$i,'users'=>$users,'img'=>$img,'num'=>$num]);
        }
    }
}

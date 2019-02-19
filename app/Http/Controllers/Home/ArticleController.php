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
use DB;

class ArticleController extends Controller
{
    //显示文章方法
    public function index()
    {
        //查找文章
        

        return redirect('/');

        
    }


    //添加文章方法
    public function create()
    {
        //从数据库中取出分类
        $rs = Type::get();
        //查找个人分类
        $mytype = Clas::where('uid',session('userid'))->get();
        if($mytype->count() == 0){
              return view('home.article.add',['title'=>'写文章','rs'=>$rs]);
        }else{
             return view('home.article.add',['title'=>'写文章','rs'=>$rs,'mytype'=>$mytype]);
         }
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

        //如果person的值为空,则直接接受id值
        if(!$clasname == null){

        
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
        } else {
            $classid = $request->input('other');
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

    //获取文章分类信息的方法
    public function ajax(){
        //获取分类的id
        $pid = $_GET['pid'];
        //获取子分类
        $info = Type::where('pid',$pid)->get();
        echo json_encode($info);
        
    }

    //编辑文章方法
    public function edit($id)
    {
        //通过id获取文章信息
        $info = Article::where('id',$id)->first();
       //从数据库中取出分类
        $rs = Type::get();
        //查找个人分类
        $mytype = Clas::where('uid',session('userid'))->get();

        return view('home.article.edit',['info'=>$info,'rs'=>$rs,'mytype'=>$mytype,'title'=>'修改文章']);


    }

    //处理修改文章
    public function update(Request $request, $id)
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
      
             $res = Article::where('id',$id)->update($rs);
        } catch(\Exception $e) {
            return back()->with('error','修改失败');
        }
        return redirect('/home/myblog');
    }

   //删除文章方法
    public function delete(Request $request)
    {
        //获取文章的id
        $id = $request->id;
        //删除文章及文章相关信息
        Article::where('id',$id)->delete();
        Art_info::where('art_id',$id)->delete();
        Comment::where('art_id',$id)->delete();

        return back();

       
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

        


        //从数据库读取所有文章
        
        $rs = \DB::table('article')->join('art_info','article.id','=','art_info.art_id')->select('*')->where('type_id','like','%'.$request->pid.'%')->orderBy('read_num','desc')->limit(8)->paginate(6);
        
        return view('home.article.total',['rs'=>$rs,'title'=>'博客列表页','info'=>$info]);
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

        $rs = Article::with('artinfo')->where('person','like','%'.$person.'%')->where('uid',$uid)->orderBy('addtime','desc')->paginate(10);


        //查找个人的分类
        $mytype = Clas::where('uid',$uid)->get();

      
        return view('home.article.myblog',['rs'=>$rs,'mytype'=>$mytype,'title'=>$username.'的博客']);
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

     //删除评论的方法
     public function delcom()
     {
        $comid =  $_GET['comid'];
        //查找用户id
        $uid = Comment::where('id',$comid)->first()->uid;
        //查找文章id
        $artid = Comment::where('id',$comid)->first()->art_id;
        //通过文章id查找文章的作者id
        $auid = Article::where('id',$artid)->first()->uid;
        
        //判断该评论是本人或者文章作者才可以删除
        if(session('userid') == $uid || $auid == session('userid')){            
            //删除评论
            $data = Comment::destroy($comid);
            if($data){
                return '删除成功!';
            } else {
                return '删除失败!';
            }
        } else {
            return '无法删除他人评论!';
        }
        
     }


     //点赞的方法
     public function goods()
     {
        $artids = $_GET['artids'];
        $artinfo = DB::table('art_info')->where('art_id',$artids)->first();
        $good['good_num'] = $artinfo->good_num + 1 ;
        $data = DB::table('art_info')->where('art_id',$artids)->update($good);
        if($data){
            return 1;
        } else {
            return 0;
        }
     }
}

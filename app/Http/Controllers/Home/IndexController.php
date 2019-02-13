<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Articel;
use App\Model\Admin\Type;
use App\Model\Admin\User;
use DB;

class IndexController extends Controller
{
    //显示首页方法
    public function index(User $user){
    	//从数据库中查找优质文章
    	$rs = \DB::table('article')->join('art_info','article.id','=','art_info.art_id')->select('*')->orderBy('addtime','desc')->limit(8)->get();
        
    	//查询一级分类信息
    	$cate = Type::where('pid','0')->get();

        foreach($cate as $ks=>$vs){
            //把一级分类的类名添加到数组中
            //通过一级分类的id作为二级分类的pid来查询二级分类
            $data = Type::where('pid',$vs->id)->get();
            //把二级分类名组成一个新数组
            $min_cate = [];
            $info[$vs->id][0] = $vs->name; 
            foreach($data as $k=>$v){
                $min_cate[$v->id] = $v->name;
            }

            
            $info[$vs->id][$v->id] = $min_cate;               
            }
            
          
     
            //每三个数组变为一个数组单元插入到新数组中
      
    	$count =Type::where('pid','0')->count();
    	

        //显示轮播图
        $banner = \DB::table('banner')->get();

        return view('home.welcome',['title'=>'首页','rs'=>$rs,'cate'=>$cate,'count'=>$count,'info'=>$info,'banner'=>$banner]);
        
    }
}

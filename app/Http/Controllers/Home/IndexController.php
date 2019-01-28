<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Articel;
use App\Model\Admin\Type;

class IndexController extends Controller
{
    //显示首页方法
    public function index(){
    	//从数据库中查找优质文章
    	 $rs = \DB::table('article')->join('art_info','article.id','=','art_info.art_id')->select('*')->orderBy('read_num','desc')->limit(8)->get();
        
    	 //查询分类信息
    	 $cate = Type::where('pid','0')->get();
    	 $count =Type::where('pid','0')->count();
    	 $type = Type::all();
    	
    	 $i = 0;
    	 $k = 0;
    	 $info = [];
    	 foreach($type as $k=>$v){
    	 	$info[] = $v->name; 
    	 }
    	
    	return view('home.welcome',['title'=>'首页','rs'=>$rs,'cate'=>$cate,'count'=>$count,'i'=>$i,'k'=>$k,'info'=>$info]);
    }

}

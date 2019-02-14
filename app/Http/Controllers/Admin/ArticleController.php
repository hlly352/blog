<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;


class ArticleController extends Controller
{
    //后台显示文章
    public function show(Request $request){
    	$res = Article::with('artinfo')->where('title','like','%'.$request->title.'%')->paginate($request->input('nums',10));
 		  $i = 1;
    	return view('admin.article.index',['h1'=>'显示文章','res'=>$res,'i'=>$i,'request'=>$request]);
    }
   	//显示文章想请
   	public function info(Request $request){
   		//接受id
   		$id = $request->id;
   		//查询文章详情
   		$rs = Article::where('id',$id)->first();
   		return view('admin.article.info',['title'=>'文章详情','rs'=>$rs]);
   	}
   	//删除文章方法
   	public function del(Request $request){
   		//接受id
   		$id = $request->id;

   		//删除文章和文章详情
   		try{
   			 $rs = Article::find($id);
   			 $rs->delete();
   			 
   			 $rs->artinfo()->delete();
   		} catch(\Exception $e) {
   		return back()->with('error','删除失败');
   		}
   		return back()->with('success','删除成功');
   	}
}
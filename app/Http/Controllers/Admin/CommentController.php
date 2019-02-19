<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Comment;

class CommentController extends Controller
{
    //查看评论方法
    public function show(Request $request){
    	$rs  = Comment::where('content','like','%'.$request->content.'%')->paginate($request->input('nums',10));

    	$i = 1;
    	return view('admin.comment.index',['rs'=>$rs,'title'=>'查看评论','i'=>$i,'request'=>$request]);
    }
    //删除评论
    public function del(Request $request){
    	$id = $request->id;

    	//删除评价
    	try{
    		Comment::destroy($id);
    	} catch(\Exception $e) {
    		return back()->with('error','删除失败');
    	}

    	return back()->with('success','删除成功');
    }
}

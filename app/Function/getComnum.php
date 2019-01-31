<?php

	//获取当前用户的总评论数
	
	function getComnum($uid){
		//获取当前用户所有的文章
		$articles = DB::table('article')->where('uid',$uid)->get();
		$comment_num = 0;
		foreach($articles as $k=>$v){
			//通过文章文章id查询评论数
			$comment_num += DB::table('comment')->where('art_id',$v->id)->count();
		}

		return $comment_num;
	}
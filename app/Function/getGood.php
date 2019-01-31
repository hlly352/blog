<?php

	//获取点赞数量方法
	function getGood($uid){
			//获取当前用户所有的文章
		$articles = DB::table('article')->where('uid',$uid)->get();

		$good_num = 0;

		foreach($articles as $k=>$v){
			$good_num += DB::table('art_info')->where('art_id',$v->id)->count();
		}

		return $good_num;
	}
<?php

	//获取文章的个人分类
	function getPerson($tid){
		
			$rs = DB::table('clas')->where('id',$tid)->first();

			if(count($rs) != 0){
				return $rs->name;
			} else {
				return '未分类';
			}
	}
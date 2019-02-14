<?php

	//获取文章的个人分类
	function getPerson($tid){
		
			$rs = DB::table('clas')->where('id',$tid)->first()->name;

			return $rs;
	}
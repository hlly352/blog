<?php
	function getCom($num){
		//通过文章id过去评论的总数
		$rs = DB::table('comment')->where('art_id',$num)->count();

		if($rs){
			return $rs;
		}
	}
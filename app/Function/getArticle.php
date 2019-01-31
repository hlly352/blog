<?php
function getArticle($uid){
	
	$count = \DB::table('article')->where('uid',$uid)->count();
	if($count){
		return $count;
	} else {
		return 0;
	}
}
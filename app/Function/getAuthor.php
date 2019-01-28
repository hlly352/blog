<?php

	function getAuthor($num){
		$rs = DB::table('user')->where('id',$num)->first();
		if($rs){
			
		return $rs->username;
		}
	}
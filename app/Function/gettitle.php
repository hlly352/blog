<?php

	function gettitle($num){
		$rs = DB::table('article')->where('id',$num)->first();

		if(count($rs)){
			return $rs->title;
		}
	}
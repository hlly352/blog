<?php

	function gettitle($num){
		$rs = DB::table('article')->where('id',$num)->first();

		return $rs->title;
	}
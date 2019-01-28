<?php

	function getParent($num){
		if($num == '0'){
			return '顶级分类';
		} else {
			$rs = DB::table('art_type')->where('id',$num)->first();

			return $rs->name;
		}
	}
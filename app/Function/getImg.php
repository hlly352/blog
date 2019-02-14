<?php 

	function getImg($uid){
		$rs = DB::table('userinfo')->where('uid',$uid)->first();
		if($rs){			
			return $rs->profile;
		}
	}


 ?>
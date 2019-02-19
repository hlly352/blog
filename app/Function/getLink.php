<?php 
	
	function getLink(){

		$rs = DB::table('friend_link')->where('status','0')->get();

		return $rs;
	}
 ?>
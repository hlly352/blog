<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //后台文章模型
    protected $table = 'article';

    protected $primarykey = 'id';

    //取消时间维护
   	public  $timestamps = false;

    public $guarded = [];

    public function artinfo(){
    	return $this->hasOne('App\Model\Admin\Art_info','art_id','id');
    }





}

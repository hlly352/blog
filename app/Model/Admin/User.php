<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 与模型关联的数据表
     *


     * @var string
     */
    protected $table = 'user';


    protected $primarykey = 'id';

    public $timestamps = false;


	protected $guarded = [];


    /**
     * 获得与用户表关联的详情信息 
     */
    public function infos()
    {
        return $this->hasOne('App\Model\Admin\Userinfo','uid','id');
    }


    public function article(){
        return $this->hasMany('App\Model\Article','uid','id');
    }


}

<?php

namespace App\Model\Home;

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

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];

    /**
     * 获得与用户表关联的详情信息 
     */
    public function infos()
    {
        return $this->hasOne('App\Model\Home\Userinfo','uid','id');
    }
    //与用户的分类表关联
    public function clas()
    {

        return $this->hasMany('App\Model\Home\Clas','uid','id');
    

    }
    // public function gravatar($size = '100')
    // {
    // $hash = md5(strtolower(trim($this->attributes['username'])));

    // return "http://www.gravatar.com/avatar/$hash?s=$size";
    
    // }

}

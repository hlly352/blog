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
     * 获得此用户的详情。
     */
    public function infos()
    {
        return $this->hasOne('App\Model\Admin\Userinfo','uid','id');
    }

    /**
     * 获得此用户的文章。
     */
    public function article(){
        return $this->hasMany('App\Model\Admin\Article','uid','id');
    }

    /**
     * 获得此用户的角色。
     */
    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role','user_role','user_id','role_id');
    }
}

<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 与模型关联的数据表
     *
<<<<<<< HEAD
     * @var firend_link
     */
    protected $table = '';
=======
     * @var string
     */
    protected $table = 'user';
>>>>>>> 40c69d08601d8d0c757df2f68f19a42500a4dadf
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
<<<<<<< HEAD
=======


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

>>>>>>> 40c69d08601d8d0c757df2f68f19a42500a4dadf
}

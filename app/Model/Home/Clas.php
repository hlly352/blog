<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'clas';
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

    //和文章表进行一对多关联
    public function cla()
    {
        return $this->hasMany('App\Model\Admin\Article','person','id');
    }
}

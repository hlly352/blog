<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //文章类型模型
    protected $table = 'art_type';
    protected $primarykey = 'id';
    public $timestamps = false;

    protected $guarded = [];
}

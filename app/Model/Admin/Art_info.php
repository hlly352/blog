<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Art_info extends Model
{
    //文章信息模型
    protected $table = 'art_info';

    protected $primarykey = 'id';

    public  $timestamps = false;

    public $guarded = [];


}

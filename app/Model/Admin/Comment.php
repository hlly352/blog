<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        //文章评论模型
    protected $table = 'comment';

    protected $primarykey = 'id';

    public  $timestamps = false;

    public $guarded = [];

}
